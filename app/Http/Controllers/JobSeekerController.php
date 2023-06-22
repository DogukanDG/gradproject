<?php

namespace App\Http\Controllers;
use id;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JobSeekerListing;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\matches;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    // public function index(){
    

    // $jobListings = JobSeekerListing::all();
    // $user = auth()->user();
    // $jobseekerSkills = $user ? Listing::where('user_id', $user->id)->where('applysearch',true)->get() : Listing::all();
    // $employeeTargetSkillsArray = $jobseekerSkills[0]->getAttributes()['skills'];
    // $employerListings = $user ? Listing::where('user_id', $user->id)->get() : Listing::all();
    // $matches = [];
    // foreach ($jobListings as $jobListing){
    //     $matchedSkills = array_intersect(json_decode($employeeTargetSkillsArray), json_decode($jobListing->skills));
    //     $matchScore = count($matchedSkills);

    //     if ($matchScore >= 0) {
    //         $matches[] = [
    //             'listing' => $jobListing,
    //             'match_score' => $matchScore,
    //         ];
    //     }
    // }
    // // foreach ($employerListings as $employerListing) {
    // //     $matchedSkills = array_intersect(json_decode($employerListing->skills), $jobseekerSkills);
    // //     $matchScore = count($matchedSkills);

    // //     if ($matchScore > 0) {
    // //         $matches[] = [
    // //             'listing' => $employerListing,
    // //             'match_score' => $matchScore,
    // //         ];
    // //     }
    // // }

    // // Sort the matches by match score in descending order
    // usort($matches, function ($a, $b) {
    //     return $b['match_score'] <=> $a['match_score'];
    // });
    // //dd(JobSeekerListing::latest(),$matches);
    // //dd($matches[0]['listing']->getAttributes());
    // if($user){
    //     return view('listings.jobseekerindex', ['sortedlisting' => $matches]);
    // } else{
    //     return view('listings.jobseekerindex' ,['jobseekerlistings' => JobSeekerListing::latest() -> filter(request(['skills','search'])) -> simplepaginate(6)]);
    // }
    
    // }

    // public function index()
    // {
       
    // $user = auth()->user();
    // if(!$user){
    //     return view('listings.jobseekerindex', ['jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    // }
    // $emptyCondition = Listing::where('user_id', $user->id)->where('applysearch',true)->get();
    // if ($user->role === 'employer' && !($emptyCondition->isEmpty())) {
    //     $jobListings = JobSeekerListing::all();
    //     $jobseekerSkills = Listing::where('user_id', $user->id)
    //         ->where('applysearch', true)
    //         ->get();
    //     if(!empty($jobseekerSkills)){
    //         $employeeTargetSkillsArray = $jobseekerSkills[0]->getAttributes()['skills'];
    //         $matches = [];
        
    //     foreach ($jobListings as $jobListing) {
    //         $matchedSkills = array_intersect(
    //             json_decode($employeeTargetSkillsArray),
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

    //     return view('listings.jobseekerindex', ['sortedlisting' => $matches, 'jobseekerlistings' => []]);
    //     }else{
    //         return view('listings.jobseekerindex', ['jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    //     }
        
    //     } else {
    //     return view('listings.jobseekerindex', ['jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(6),'sortedlisting'=>[]]);
    // }
    // }
    public function index()
    {
    $user = auth()->user();
    if (!$user) {
        return view('listings.jobseekerindex', [
            'jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(100),
            'sortedlisting' => []
        ]);
    }

    $emptyCondition = Listing::where('user_id', $user->id)->where('applysearch', true)->get();

    if ($user->role === 'employer' && !($emptyCondition->isEmpty())) {
        $jobListings = JobSeekerListing::all();
        $jobseekerSkills = Listing::where('user_id', $user->id)
            ->where('applysearch', true)
            ->get();

        if (!empty($jobseekerSkills)) {
            $employeeTargetSkillsArray = $jobseekerSkills[0]->getAttributes()['skills'];
            $matches = [];

            foreach ($jobListings as $jobListing) {
                $matchedSkills = array_intersect(
                    json_decode($employeeTargetSkillsArray),
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
                    || stripos($match['listing']->location, $searchTerm) !== false
                    || stripos($match['listing']->name, $searchTerm) !== false
                    || stripos($match['listing']->last_name, $searchTerm) !== false;
            })->toArray();

            return view('listings.jobseekerindex', [
                'sortedlisting' => $searchedMatches,
                'jobseekerlistings' => []
            ]);
        } else {
            return view('listings.jobseekerindex', [
                'jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(100),
                'sortedlisting' => []
            ]);
        }
    } else {
        return view('listings.jobseekerindex', [
            'jobseekerlistings' => JobSeekerListing::latest()->filter(request(['skills', 'search']))->simplePaginate(100),
            'sortedlisting' => []
        ]);
    }
}

    

 
    public function applysearch(JobSeekerListing $jobseekerlisting)
    {
     $userId = auth()->user()->id; // Get the ID of the current authenticated user
 
     // Set applysearch = 1 for the specified listing of the current user
     $jobseekerlisting->applysearch = 1;
     $jobseekerlisting->save();
 
     // Set applysearch = 0 for all other listings of the current user
     JobSeekerListing::where('user_id', $userId)
         ->where('id', '!=', $jobseekerlisting->id)
         ->update(['applysearch' => 0]);
 
     return redirect('/employers')->with('success', 'Apply Search updated successfully.');
 }
        
    public function create(){
        
        return view('listings.jobseekercreate');

    }
    public function store(Request $request){
        $user = auth()->user();
        $hasListing = JobSeekerListing::where('user_id', $user->id)->where('applysearch', 1)->exists();
        if ($hasListing) {
            return redirect('/listings/jobseekermanage')->with('error','You can only create 1 listing');
        } else {
            $skills = $request->input('skills');
        $educations = $request->input('educations');
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'description' => 'required',    
        ]);
        $formFields['skills'] = json_encode($skills);
        if($request->hasFile('cv')){
            $formFields['cv'] = $request ->file('cv')->store('cvs','public');
        }
        $formField['is_active'] = true;
        $formFields['educations'] = json_encode($educations);
        // $array = json_decode($formFields['educations']);
        // dd($formFields['educations'],$array[0]);
        $formFields['user_id'] = auth()->id();
        $formFields['name'] = auth()->user()->name;
        $formFields['last_name'] = auth()->user()->last_name;
        $formFields['email'] = auth()->user()->email;
        $formFields['expiration_date'] = now()-> addDays(60);
        
        $userListings = JobSeekerListing::where('user_id', auth()->id())->get(); // Retrieve other listings created by the same user
        
        foreach ($userListings as $listing) {
            $listing->applysearch = 0; 
            $listing->save();
        }

        $jobseekerlisting = JobSeekerListing::create($formFields);
        $jobseekerlisting->applysearch = 1; 
        $jobseekerlisting->save();
        return redirect('/')->with('message','Listing Created');
        }
       
    }

    public function show($id){
        $jobseekerlisting = JobSeekerListing::find($id);

        if ($jobseekerlisting) {
            return view('listings.jobseekershow', [
                'jobseekerlisting' => $jobseekerlisting
            ]);
        } else {
            return view('error');
        }
    }
    public function edit(JobSeekerListing $jobseekerlisting){
        return view('listings.jobseekeredit',['jobseekerlisting'=>$jobseekerlisting]);
        
    }
    
    public function update(Request $request,JobSeekerListing $jobseekerlisting){
        //dd($request->all(),$listing);
        $skills = $request->input('skills');
        $educations = $request->input('educations');
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'description' => 'required',
            'cv'=>'mimes:pdf|max:2048',
        ]);
        $formFields['skills'] = json_encode($skills);
        if($request->hasFile('cv')){
            $formFields['cv'] = $request ->file('cv')->store('cvs','public');
        }
        $formField['is_active'] = true;
        $formFields['educations'] = json_encode($educations);
        // $array = json_decode($formFields['educations']);
        // dd($formFields['educations'],$array[0]);
        $formFields['user_id'] = auth()->id();
        $formFields['name'] = auth()->user()->name;
        $formFields['email'] = auth()->user()->email;
        $formFields['expiration_date'] = now()-> addDays(60);
        $jobseekerlisting->update($formFields);
        return redirect('/')->with('message','Listing Edited');
    }
    
    
    public function downloadcv(JobSeekerListing $jobseekerlisting)
    {   
       return response()->download(public_path('storage/'. $jobseekerlisting['cv']));
   }

    
    public function delete(JobSeekerListing $jobseekerlisting){
         if($jobseekerlisting->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
         }
         
        $isApplySearchOne = $jobseekerlisting->applysearch == 1;
        $jobseekerlisting->delete();
        
        if ($isApplySearchOne) {
            $latestListing = JobSeekerListing::latest()->first();
            
            if ($latestListing) {
                $latestListing->applysearch = true;
                $latestListing->save();
            }
        }

        return redirect('')->with('message','Listing Deleted Successfully');
    }
    public function renew(JobSeekerListing $jobseekerlisting){
        $jobseekerlisting->update(['expiration_date'=>now()->addDays(60)]);
        return redirect()->back()->with('message','Listing Renewed!');
     }
    //ALSO ADD MANAGE LİSTİNGS HERE
    public function manage(){
        return view('listings.managejobseekerlistings', ['jobseekerlistings'=>auth()
        ->user()->jobseekerlistings()->get()]);
    }

}