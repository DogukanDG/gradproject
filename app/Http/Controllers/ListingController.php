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

    // public function index(){
    //     $user = auth()->user();
    //     if(!$user){
    //         return view('listings.index', ['listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    //     }
    //     $emptyCondition = JobSeekerListing::where('user_id', $user->id)->where('applysearch',true)->get();
        
    // if ($user->role === 'job-seeker' && !($emptyCondition->isEmpty())) {
    //     $jobListings = Listing::all();
    //     $employerSkills = JobSeekerListing::where('user_id', $user->id)
    //         ->where('applysearch', true)
    //         ->get();
    //      if(!empty($employerSkills)){
    //         $jobSeekerTargetSkillsArray = $employerSkills[0]->getAttributes()['skills'];
    //         $matches = [];
    //     foreach ($jobListings as $jobListing) {
    //         $matchedSkills = array_intersect(
    //             json_decode($jobSeekerTargetSkillsArray),
    //             json_decode($jobListing->skills)
    //         );
    //         $matchScore = count($matchedSkills);

    //         if ($matchScore >= 0) {
    //             $matches[] = [
    //                 'listing' => $jobListing,
    //                 'match_score' => $matchScore,
    //             ];
    //         }
    //     }

    //     // Sort the matches by match score in descending order
    //     usort($matches, function ($a, $b) {
    //         return $b['match_score'] <=> $a['match_score'];
    //     });
    //     return view('listings.index', ['sortedlisting' => $matches, 'listings' => []]);
    //      }else{
    //         return view('listings.index', ['listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    //      }
    // }else{
    //     return view('listings.index', ['listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    // }
        
    //     // return view('listings.index', [
        
    //     //     'listings' => Listing::latest() -> filter(request(['tag','search'])) -> simplepaginate(6)
    //     // ]); //the name of the view that we want to return
    // }
    public function index()
{
    $user = auth()->user();
    if (!$user) {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),
            'sortedlisting' => []
        ]);
    }

    $emptyCondition = JobSeekerListing::where('user_id', $user->id)->where('applysearch', true)->get();

    if ($user->role === 'job-seeker' && !($emptyCondition->isEmpty())) {
        $jobListings = Listing::all();
        $employerSkills = JobSeekerListing::where('user_id', $user->id)
            ->where('applysearch', true)
            ->get();

        if (!empty($employerSkills)) {
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

            // Sort the matches by match score in descending order, or by created_at if all match scores are 0
            usort($matches, function ($a, $b) {
                if ($a['match_score'] === 0 && $b['match_score'] === 0) {
                    return $b['listing']->created_at <=> $a['listing']->created_at;
                }
                return $b['match_score'] <=> $a['match_score'];
            });

            $searchedMatches = collect($matches)->filter(function ($match) {
                $searchTerm = request('search');
                return stripos($match['listing']->title, $searchTerm) !== false
                    || stripos($match['listing']->description, $searchTerm) !== false
                    || stripos($match['listing']->skills, $searchTerm) !== false
                    || stripos($match['listing']->name, $searchTerm) !== false
                    || stripos($match['listing']->location, $searchTerm) !== false;
            })->toArray();

            return view('listings.index', [
                'sortedlisting' => $searchedMatches,
                'listings' => []
            ]);
        } else {
            return view('listings.index', [
                'listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),
                'sortedlisting' => []
            ]);
        }
    } else {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),
            'sortedlisting' => []
        ]);
    }
}

    

    
    //show single listing
    public function show($id){
        $listing = Listing::find($id);
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
       }
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
            'description' => 'required',
            'person_need'=>['required', 'numeric', 'max:10']
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request ->file('logo')->store('logos','public');
        }
        
        $formFields['skills'] = json_encode($skills);
        $formFields['user_id'] = auth()->id();
        $formField['is_active'] = true;
        $formFields['expiration_date'] = now()-> addDays(60);
        $userListings = Listing::where('user_id', auth()->id())->get(); // Retrieve other listings created by the same user
        
        foreach ($userListings as $listing) {
            $listing->applysearch = 0; // Set apply_search to 0 for other listings
            $listing->save();
        }
        
        $listing = Listing::create($formFields);
        $listing->applysearch = 1; // Set apply_search to 1 for the newly created listing
        $listing->save();
        return redirect('/')->with('message','Listing Created');
    }
    public function edit(Listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
       }
        return view('listings.edit',['listing'=>$listing]);
        
    }
    
    public function update(Request $request,Listing $listing){
         if($listing->user_id != auth()->id()){
             abort(403,'Unauthorized Action');
        }
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
        $formFields['expiration_date'] = now()-> addDays(60);
        $listing->update($formFields);
        
        return redirect()->back()->with('message','Listing Updated!');
        }

        
        //*APPLY SEARCH
        
        public function applysearch(Listing $listing)
        {
            if($listing->user_id != auth()->id()){
                abort(403,'Unauthorized Action');
           }
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
             if($listing->user_id != auth()->id()){
                 abort(403,'Unauthorized Action');
            }
            $isApplySearchOne = $listing->applysearch == 1;
            $listing->delete();
            
            if ($isApplySearchOne) {
                $latestListing = Listing::latest()->first();
                
                if ($latestListing) {
                    $latestListing->applysearch = true;
                    $latestListing->save();
                }
            }
            
            return redirect('')->with('message', 'Listing Deleted Successfully');
            
        }
        public function renew(Listing $listing){
            if($listing->user_id != auth()->id()){
                abort(403,'Unauthorized Action');
           }
            $listing->update(['expiration_date'=>now()->addDays(60)]);
            return redirect()->back()->with('message','Listing Renewed!');
         }
        //Manage listings
        public function manage(){
            return view('listings.manage', ['listings'=>auth()
            ->user()->listings()->get()]);
        }
        
        
}