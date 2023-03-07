<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings

    public function index(){
        return view('listings.index', [
        
            'listings' => Listing::latest() -> filter(request(['tag','search'])) -> get()
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
}