<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\JobSeekerListing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationOffers;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\JobSeekerController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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
Route::get('/',[ListingController::class,'index'])->name('/');




//*Show Create Form

Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//*JOB SEAKER CREATE FORM
Route::get('/listings/createjobseeker',[JobSeekerController::class,'create'])->middleware('auth');
//*Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//*Edit submit to update listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');



//*Edit submit to update listing
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');

//*Store Listing Data
Route::post('/listings',[ListingController::class,'store']);

//*Person listings page

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
 
Route::get('/listings/jobseekermanage', [JobSeekerController::class,'manage'])->middleware('auth');
//*Single Listing with specified id
//*all() and find() both is a valid method
//*Show single form this has to be at the end of the page or its causes a bug 
Route::get('/listings/{id}',[ListingController::class,'show']);

//*OFFERS AND APPLİCATONS FOR JOB SEEKER AND EMPLOYERS


Route::get('/applications',[ApplicationOffers::class,'index1'])->middleware('auth');
Route::get('/offers',[ApplicationOffers::class,'index2'])->middleware('auth');


//*Show User Registration Page
//*Route::get('/register', [UserController::class,'create'])->middleware('guest');

Route::post('/users',[UserController::class,'store']);


//*Loging out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//*Login Page
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//*Log in
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//*Downloading as pdf
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->middleware('auth');


//*JOB SEEKER ROUTES
Route::get('/job-seekers/{jobseekerlisting}/edit',[JobSeekerController::class,'edit'])->middleware('auth');
Route::put('/job-seekers/{jobseekerlisting}',[JobSeekerController::class,'update'])->middleware('auth');
//*Delete Job Seeker Listing
Route::delete('/job-seekers/{jobseekerlisting}',[JobSeekerController::class,'delete'])->middleware('auth');

Route::get('/job-seekers',[JobSeekerController::class,'index']);



Route::post('/jobseekerlistings',[JobSeekerController::class,'store']);

Route::get('/job-seekers/{id}',[JobSeekerController::class,'show']);




 
Route::get('/newregister', function () {
    return view('users.register');
})->name('newregister');

Route::get('/verify', function () {
    return view('components.verify');
})->name('verify');


Route::post('/kayit', [AuthController::class,'create'])->name('kayit');
Route::post('/verify', [AuthController::class,'verify'])->name('verify');


//*Common Resources Routes:
//*index-Show all listings
//*show- Show single listing
//*create-Show form to create new listing
//*store-Store new listing
//*dit-Show form to edit listing
//*update-update listing
//*destroy - Delete listing





//*this is for doing a search like (.../search?name=Brad&city=Boston) Request and Query Parameters
//* Route::get('/search',function(Request $request){
//*     return ($request->name.' '.$request->city);
//* });