<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//This for returning all listings from the Listing model that we created
Route::get('/',[ListingController::class,'index']);




//Show Create Form

Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Edit submit to update listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

//Edit submit to update listing
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');

//Store Listing Data
Route::post('/listings',[ListingController::class,'store']);

//Person listings page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


//Single Listing with specified id
//all() and find() both is a valid method
//Show single form this has to be at the end of the page or its causes a bug 
Route::get('/listings/{id}',[ListingController::class,'show']);



//Show User Registration Page
Route::get('/register', [UserController::class,'create'])->middleware('guest');

Route::post('/users',[UserController::class,'store']);


//Loging out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Login Page
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Log in
Route::post('/users/authenticate',[UserController::class,'authenticate']);





//Common Resources Routes:
//index-Show all listings
//show- Show single listing
//create-Show form to create new listing
//store-Store new listing
//edit-Show form to edit listing
//update-update listing
//destroy - Delete listing





//this is for doing a search like (.../search?name=Brad&city=Boston) Request and Query Parameters
// Route::get('/search',function(Request $request){
//     return ($request->name.' '.$request->city);
// });