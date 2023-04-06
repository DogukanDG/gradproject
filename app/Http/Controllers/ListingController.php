<?php

namespace App\Http\Controllers;

use id;
use auth;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;




class ListingController extends Controller
{
    //Show all listings;

    public function index(){
        return view('listings.index', [
        
            'listings' => Listing::latest() -> filter(request(['tag','search'])) -> simplepaginate(6)
        ]); //the name of the view that we want to return
    }

    //show single listing
    public function show($id){
        $listing = Listing::find($id);

    if ($listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    } else {
        return view('error');
    }
    }
    
    //show create listing form
    public function create(){
        return view('listings.create');
        
    }
    
    //This function is for storing a form
    public function store(Request $request){
        
        $formFields = $request->validate([
            'title' => 'required',
            'name' => ['required', Rule::unique('listings', 'name')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request ->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();
        
        
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Created');
    }
    public function edit(Listing $listing){
        
        return view('listings.edit',['listing'=>$listing]);
        
    }
    
    public function update(Request $request,Listing $listing){
        // if($listing->user_id != auth()->id()){
        //     abort(403,'Unauthorized Action');
        // }
        
        $formFields = $request->validate([
            'title' => 'required',        
            'name' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request ->file('logo')->store('logos','public');
        }

        
        $listing->update($formFields);
        
        return redirect()->back()->with('message','Listing Updated!');
        }

        //Delete Listing
        public function delete(Listing $listing){
            // if($listing->user_id != auth()->id()){
            //     abort(403,'Unauthorized Action');
            // }
            $listing->delete();
            return redirect('')->with('message','Listing Deleted Successfully');
            
        }
        //Manage listings
        public function manage(){
            return view('listings.manage', ['listings'=>auth()
            ->user()->listings()->get()]);
        }
       
}