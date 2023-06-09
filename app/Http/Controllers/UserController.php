<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public $phone;

    public $showModal = false;
    //show register create form
    public function create(){
        return view('users.register');
    }

    //Post request to store the user
    public function store(Request $request){
        //dd($request->all());
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'role'=>['required'],
            'email' => ['required', Rule::unique('users', 'email')],
            'phone'=>['required', Rule::unique('users', 'phone')],
            'password' => 'required|confirmed|min:6',
    
        ]);

        //Laravel function to encrypt the message
        $formFields['password'] = bcrypt($formFields['password']);

        //User Create
        $user = User::create($formFields);
        dd($user);
        auth()->login($user);
        return redirect('/')->with('message','User create and logged in');
    
    }
    public function logout(Request $request){
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('Logged Out Succesfully ');
    }
    
    public function login(){
        return view('users.login');
    }

    //authenticate
    public function authenticate(Request $request){
        //dd($request->all());
        $formFields = $request->validate([
            'email' => ['required',  'email'],
            'password' => 'required',
    
        ]);
        if(auth()->attempt($formFields)){
                $request->session()->regenerate();
                return redirect('/')->with('Logged In Succesfully ');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        
    }
}