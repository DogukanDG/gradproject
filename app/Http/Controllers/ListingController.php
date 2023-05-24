<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerListing;
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
    public function homepage(){
        return view('pages.homepage');
    }

    public function index(){
        $user = auth()->user();
    
    if ($user && $user->role === 'job-seeker') {
        $jobListings = Listing::all();
        $employerSkills = JobSeekerListing::where('user_id', $user->id)
            ->where('applysearch', true)
            ->get();
        $jobSeekerTargetSkillsArray = $employerSkills[0]->getAttributes()['skills'];
        $matches = [];
        
        foreach ($jobListings as $jobListing) {
            $matchedSkills = array_intersect(
                json_decode($jobSeekerTargetSkillsArray),
                json_decode($jobListing->skills)
            );
            $matchScore = count($matchedSkills);

            if ($matchScore >= 0) {
                $matches[] = [
                    'listing' => $jobListing,
                    'match_score' => $matchScore,
                ];
            }
        }

        // Sort the matches by match score in descending order
        usort($matches, function ($a, $b) {
            return $b['match_score'] <=> $a['match_score'];
        });
        
        return view('listings.index', ['sortedlisting' => $matches, 'listings' => []]);
    } else {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    }
        
        // return view('listings.index', [
        
        //     'listings' => Listing::latest() -> filter(request(['tag','search'])) -> simplepaginate(6)
        // ]); //the name of the view that we want to return
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
    
        $skills = $request->input('skills');
        $formFields = $request->validate([
            'title' => 'required',
            'name' => ['required', Rule::unique('listings', 'name')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request ->file('logo')->store('logos','public');
        }
        $formFields['skills'] = json_encode($skills);
        $formFields['user_id'] = auth()->id();
        $formField['is_active'] = true;
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
        $skills = $request->input('skills');
        $formFields = $request->validate([
            'title' => 'required',        
            'name' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required'
        ]);
        
        if($request->hasFile('logo')){
            $formFields['logo'] = $request ->file('logo')->store('logos','public');
        }
        $formFields['skills'] = json_encode($skills);
        $formFields['user_id'] = auth()->id();
        $listing->update($formFields);
        
        return redirect()->back()->with('message','Listing Updated!');
        }

        
        //*APPLY SEARCH
        
        public function applysearch(Listing $listing)
        {
            $userId = auth()->user()->id;
        // Set applysearch = 1 for the specified listing
         $listing->applysearch = 1;
         $listing->save();

         // Set applysearch = 0 for all other listings
        Listing::where('user_id', $userId)
             ->where('id', '!=', $listing->id)
             ->update(['applysearch' => 0]);

             return redirect('/job-seekers')->with('success', 'Apply Search updated successfully.');
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