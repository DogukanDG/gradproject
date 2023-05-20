<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\JobSeekerListing;

class ApplicationsOffers extends Controller
{
    
    public function index1(){
        return view('listings.applications');
    }
    public function index2(){
        return view('listings.offers');
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


}