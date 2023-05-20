<?php

namespace App\Http\Controllers;
use id;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\JobSeekerListing;

class JobSeekerController extends Controller
{
    public function index(){
        return view('listings.jobseekerindex' ,['jobseekerlistings' => JobSeekerListing::latest() -> filter(request(['skills','search'])) -> simplepaginate(6)]);
    }

    public function create(){
        
        return view('listings.jobseekercreate');

    }
    public function store(Request $request){
        $skills = $request->input('skills');
        $educations = $request->input('educations');
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'description' => 'required'
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
        
        JobSeekerListing::create($formFields);
        return redirect('/')->with('message','Listing Created');
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
            'description' => 'required'
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
        $jobseekerlisting->update($formFields);
        return redirect('/')->with('message','Listing Edited');
    }
    
    public function delete(JobSeekerListing $jobseekerlisting){
        // if($listing->user_id != auth()->id()){
        //     abort(403,'Unauthorized Action');
        // }
        $jobseekerlisting->delete();
        return redirect('')->with('message','Listing Deleted Successfully');
    }

    //ALSO ADD MANAGE LİSTİNGS HERE
    public function manage(){
        return view('listings.managejobseekerlistings', ['jobseekerlistings'=>auth()
        ->user()->jobseekerlistings()->get()]);
    }

}