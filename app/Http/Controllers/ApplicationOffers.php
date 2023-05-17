<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationOffers extends Controller
{
    
    public function index1(){
        return view('listings.applications');
    }
    public function index2(){
        return view('listings.offers');
    }

}