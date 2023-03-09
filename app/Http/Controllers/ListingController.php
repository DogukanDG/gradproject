<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;





class ListingController extends Controller
{
    //Show all listings

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
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        Listing::create($formFields);
        return redirect('/')->with('message','Listing Created');
    }
}