<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerListing;
use App\Models\User;
use Barryvdh\DomPDF as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function generatePDF(Request $request)
    {
        
        $username=auth()->user()->name;
        

        $jobSeekerInfo =json_decode($request->jobseekerListing);
        $user = User::find($jobSeekerInfo->user_id);
        
        $data = [
            'title' =>$jobSeekerInfo->title,
            'date' => now()->format('d/m/Y'),
            'skills' => json_decode($jobSeekerInfo->skills),
            'name' => $user->name,
            'last_name' => $user->last_name,
            'education' => json_decode($jobSeekerInfo->educations),
            'experience'=>$jobSeekerInfo->experience,
            'location' => $jobSeekerInfo->location,
            'description' => $jobSeekerInfo->description,
            'email'=>$user->email,
            'phone'=>$user->phone,
        ]; 
        $pdf = FacadePdf::loadView('components.PDF', $data);
        return $pdf->download('cv.pdf');
    }
    
    public function generatePDF2(Request $request)
    {
        
        $announcementInfo =json_decode($request->listing);
        
        $data = [
            'title' =>$announcementInfo->title,
            'date' => now()->format('d/m/Y'),
            'skills' => json_decode($announcementInfo->skills),
            'name' => $announcementInfo->name,
            'logo'=>$announcementInfo->logo,
            'location' => $announcementInfo->location,
            'personNumber'=> $announcementInfo->person_need,
            'description' => $announcementInfo->description,
            'email'=>$announcementInfo->email,
        ]; 
        $pdf = FacadePdf::loadView('components.PDFAnnouncement', $data);
        return $pdf->download('announcement.pdf');
    }
}