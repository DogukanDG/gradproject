<?php

namespace App\Http\Controllers;

use Exception;


use App\Models\User;



use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','min:3', Rule::unique('users', 'name')],
            'last_name' => ['required','min:3'],
            'role'=>['required'],
            'email' => ['required', Rule::unique('users', 'email')],
            'phone'=>['required', Rule::unique('users', 'phone')],
            'password' => 'required|confirmed|min:6',
        ]);
        //Laravel function to encrypt the message
        /* Get credentials from .env */
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
             ->verifications
            ->create($data['phone'], "sms");
        
        // User::create($data);
        // //return redirect()->route('verify')->with(['phone'=>$this->data['phone']]);
        Session::put('userInfo', $data);
        return redirect()->route('verify')->with(['userInfo'=>$data]);
    }
    protected function verify(Request $request)
    {
        $verifydata = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);
        $userInfo = [
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'role' => $request['role'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $request['password']
        ];

        session(['userInfo' => $userInfo]);
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create(['code'=>(string)$verifydata['verification_code'], 'to' => (string) $verifydata['phone']]);
        
        if ($verification->valid) {
            $user = User::create([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'role' => $request['role'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => bcrypt($request['password']),
                'isVerified' => 1
            ]);
            
                Auth::login($user);
                return redirect('/')->with('Phone number verified Logged In Succesfully ');
             }
    
        return back()->with(['phone' => $verifydata['phone'], 'error' => 'Invalid verification code entered!','userInfo'=>$userInfo]);
    }
    
}