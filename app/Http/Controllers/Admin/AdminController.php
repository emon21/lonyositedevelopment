<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class AdminController extends Controller
{
    // Admin Logout

    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect('/admin/login');
        return redirect('/');

    }

    //AdminLogin
    public function AdminLogin(Request $request){

        $userInfo = $request->only('email','password');

        if(Auth::attempt($userInfo)){
            $user = Auth::user();

            $verificationCode = random_int(100000,999999);
            $name = Auth::user()->name;

            session([
                'verification_code' =>$verificationCode,
                'user_id' => $user->id
            ]);

            Mail::to($user->email)->send(new VerificationMail($verificationCode,$name));

            Auth::logout();

            return redirect()->route('custom.verification.user')->with('status','Verification Code sent to your mail');

            return redirect()->back()->withErrors([
                'email' => 'Invalid Credentials Provided'
            ]);

        }


    }


    # VerificationUser
    public function VerificationUser(){
        return view('auth.verify');
    }


    # VerifyUser
    public function VerificationVerify(Request $request){
        
        $request->validate([

            'code' => 'required|numeric'
        ]);

        if($request->code == session('verification_code')){
            // return redirect()->back()->withErrors([
            //     'verification_code' => 'Verification Code is required'
            // ]);

            Auth::loginUsingId(session('user_id'));

            session()->forget('verification_code');
            return redirect()->intended('/dashboard');
            // session()->forget('user_id');

        }

        return redirect()->back()->withErrors([
            'code' => 'Invalid Verification Code'
        ]);


        // $request->validate([
        //     // 'verification_code' => 'required|integer'
        // ]);
        // $userId = session('user_id');
        // $storedCode = session('verification_code');

        // if($request->verification_code == $storedCode){
        //     $user = User::find($userId);
        //     Auth::login($user);

        //     session()->forget('verification_code');
        //     session()->forget('user_id');

        //     return redirect()->intended('/dashboard');
        // }else{
        //     return redirect()->back()->withErrors([
        //         'verification_code' => 'Invalid Verification Code'
        //     ]);
        // }
    }
}
