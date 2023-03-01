<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]); //the name of the view that we want to return
});

//Single Listing with specified id
//all() and find() both is a valid method

Route::get('/listing/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]); //the name of the view that we want to return
});


//this is for doing a search like (.../search?name=Brad&city=Boston) Request and Query Parameters
// Route::get('/search',function(Request $request){
//     return ($request->name.' '.$request->city);
// });