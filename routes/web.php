<?php

use App\Admin\Controllers\ApplicationController;
use App\Models\Offers;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\JobSeekerListing;
use App\Mail\OfferApplicationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ApplicationsOffers;
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

Route::get('/',[ListingController::class,'homepage']);

Route::get('/employers',[ListingController::class,'index']);



//*Show Create Form

Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//*JOB SEAKER CREATE FORM
Route::get('/listings/createjobseeker',[JobSeekerController::class,'create'])->middleware('auth');
//*Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');




//*Edit submit to update listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

Route::put('/listings/{listing}/applysearch', [ListingController::class, 'applysearch'])->name('listings.applysearch')->middleware('auth');

//Route::put('/listings/{$listing}/applysearch',[ListingController::class,'applysearch'])->middleware('auth');

//*Edit submit to update listing
Route::delete('/listings/{listing}',[ListingController::class,'delete'])->middleware('auth');

//*Renew Listings
Route::put('/listings/{listing}/renew',[ListingController::class,'renew'])->middleware('auth');

Route::put('/job-seekers/{jobseekerlisting}/renew',[JobSeekerController::class,'renew'])->middleware('auth');

//*DOWNLOAD CV
//Route::get('/job-seekers/{jobseekerlisting}/download', [JobSeekerController::class, 'downloadcv']);
Route::get('/job-seekers/{jobseekerlisting}/download', [JobSeekerController::class, 'downloadcv'])->name('jobseeker.download');

Route::get('/applications/{application}/download', [ApplicationsOffers::class, 'downloadcv'])->name('application.download');




Route::put('/offers/{application}/markreadapplication', [ApplicationsOffers::class, 'markreadapplication']);
Route::put('/applications/{offer}/markreadoffer', [ApplicationsOffers::class, 'markreadoffer']);

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


Route::get('/applications',[ApplicationsOffers::class,'index1'])->middleware('auth');
Route::get('/offers',[ApplicationsOffers::class,'index2'])->middleware('auth');

Route::put('/offers/{offer}/accept',[ApplicationsOffers::class,'offerAccept'])->middleware('auth');
Route::delete('/offers/{offer}/decline',[ApplicationsOffers::class,'offerDecline'])->middleware('auth');

Route::put('/applications/{application}/accept',[ApplicationsOffers::class,'applicationAccept'])->middleware('auth');
Route::delete('/applications/{application}/decline',[ApplicationsOffers::class,'applicationDecline'])->middleware('auth');

Route::post('/storeoffer',[ApplicationsOffers::class,'storeoffers'],);
Route::post('/storeapplication',[ApplicationsOffers::class,'storeapplications'],);

//*Renew Application
Route::put('/applications/{application}/renew',[ApplicationsOffers::class,'renew'])->middleware('auth');


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
Route::get('generate-announcementpdf', [PDFController::class, 'generatePDF2'])->middleware('auth');

//*JOB SEEKER ROUTES
Route::get('/job-seekers/{jobseekerlisting}/edit',[JobSeekerController::class,'edit'])->middleware('auth');
Route::put('/job-seekers/{jobseekerlisting}',[JobSeekerController::class,'update'])->middleware('auth');

Route::put('/job-seekers/{jobseekerlisting}/applysearch', [JobSeekerController::class, 'applysearch'])->name('jobseekerlistings.applysearch')->middleware('auth');
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