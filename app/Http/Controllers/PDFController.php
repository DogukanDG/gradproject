<?php

namespace App\Http\Controllers;

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
    public function generatePDF()
    {
        //DONT FORGET TO CHANGE THE DOWNLOAD NAME (Username.pdf)
        $username=auth()->user()->name;
        $users = User::get();
  
        $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = FacadePdf::loadView('components.PDF', $data);
        return $pdf->download('laraveltuts.pdf');
    }
}