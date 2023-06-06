<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offers;
use App\Models\Listing;
use App\Models\Applications;
use Illuminate\Http\Request;
use App\Models\JobSeekerListing;
use App\Mail\OfferApplicationMail;
use Illuminate\Support\Facades\Mail;

class ApplicationsOffers extends Controller
{
    //*APPLICATIONS PAGE
    
    public function index1(){
        $applications = Applications::latest()->get();
        return view('listings.applications',['applications' => $applications]);
    }
    
    //* OFFERS PAGE
    public function index2(){
        $offers = Offers::latest()->get();
        return view('listings.offers', ['offers' => $offers]);

    }

    public function storeoffers(Request $request){
        $formFields = $request->validate([
            'phone_number'=>'required',
            'description' => 'required',
            'sender_email'=>'required',
            
        ]);
        $listing= JobSeekerListing::findOrFail($request->listing_id);
        $formFields['receiver_id'] = $listing->user_id;
        
        $user= User::findOrFail( $formFields['receiver_id']);
        $formFields['receiver_email'] = $user->email;
        $formFields['receiver_listing_id'] = $request->input('listing_id');
        $formField['is_active'] = true;
        $formFields['sender_id'] = auth()->id();
        
        Offers::create($formFields);
        return redirect('/')->with('message','Offer Sent');
    }
    
    public function storeapplications(Request $request){
        $formFields = $request->validate([
            'phone_number'=>'required',
            'description' => 'required',
            'sender_email'=>'required',
            
        ]);
        
        $listing= Listing::findOrFail($request->listing_id);
        $formFields['receiver_id'] = $listing->user_id;
        
        $user= User::findOrFail( $formFields['receiver_id']);
        $formFields['receiver_email'] = $user->email;
        $formFields['receiver_listing_id'] = $request->input('listing_id');
        $formField['is_active'] = true;
        $formFields['sender_id'] = auth()->id();
        
        Applications::create($formFields);
        return redirect('/')->with('message','Application Sent');
    }
    public function offeraccept(Offers $offer){
        $offerfind = Offers::findOrFail($offer['id']);
        $jobSeekerListing = JobSeekerListing::findOrFail($offerfind['receiver_listing_id']);
        $employeeListing = $employeeListing = Listing::where('user_id', $offerfind['sender_id'])
        ->where('applysearch', 1)
        ->first();
        
        
        if($employeeListing->person_need >1){
            
            $employeeListing -> person_need = $employeeListing -> person_need - 1 ;
            $employeeListing->save();
        }else{
            $employeeListing -> is_active = false ;
            
        }
        
        
        $offerfind->is_active = false;
        $jobSeekerListing->is_active = false;
        $offerfind->save();
        $jobSeekerListing->save();
        
        Mail::to($offerfind['sender_email'])->send(new OfferApplicationMail($offerfind));
        
        return redirect('/offers')->with('message','Offer Accepted');
    }
    
    public function offerdecline(Offers $offer){
        $offer->delete(); 
        return redirect('/offers')->with('message','Offer Declined');
    }
    
    public function applicationaccept(Applications $application){
        $applicationfind = Applications::findOrFail($application['id']);
        $jobSeekerListing = JobSeekerListing::where('user_id', $applicationfind['sender_id'])
        ->where('applysearch', 1)
        ->first();
        $employeeListing = Listing::findOrFail($application['receiver_listing_id']);
        
        if($employeeListing->person_need >1){
            $employeeListing -> person_need = $employeeListing -> person_need - 1 ;
            $employeeListing->save();
        }else{
            $employeeListing -> is_active = false ;
            
        }
        //*IF WE WANT TO STORE IT FOR THE USER JUST MAKE IT IS_ACTIVE to FALSE 
        Mail::to($applicationfind['sender_email'])->send(new OfferApplicationMail($applicationfind));
        $applicationfind->is_active = false;
        $jobSeekerListing->is_active = false;
        $jobSeekerListing->save();
        $applicationfind->save();
        return redirect('/applications')->with('message','Offer Accepted');
        
    }
    
    public function applicationdecline(Applications $application){
        $application->delete(); 
        return redirect('/offers')->with('message','Offer Declined');
    }
    
}