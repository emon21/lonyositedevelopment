<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                'email' => 'Invalid Credentials P rovided'
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


    # Profile
    public function Profile(){
        // login yes/no
    //    $userId = Auth::check();

       $userId = Auth::user();
       $profileData = User::find($userId->id);
        return view('backend/profile/profile',['profile'=>$profileData]);
    }

    # ProfileUpdate
    public function ProfileUpdate(Request $request){
        $userId = Auth::user();
        $profile = User::find($userId->id);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;



        $oldPhotoPath = $profile->photo;
        # Profile Picture upload
        if($request->hasFile('photo')){

            $file = $request->file('photo');

            // delete old photo
            // @unlink(public_path('uploads/admin/'. $profile->photo));

            // delete old photo
            // if($profile->photo){
            //     $oldPhotoPath = public_path('uploads/admin/'.$profile->photo);
            //     if(file_exists($oldPhotoPath)){
            //         unlink($oldPhotoPath);
            //     }
            // }

            // upload photo
            $ImageUrl = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin/'),$ImageUrl);
            // $profileData['photo'] = $ImageUrl;

            // database image full path store this code //DB -> photo 'ulods/admin/202407231234.jpg' field e full path save hobe
        //    $path = 'uploads/admin/';
        //    $profileData->photo = $path . $ImageUrl;

           // database image name store this code //DB -> photo '202407231234.jpg' field e image name save hobe
           $profile->photo = $ImageUrl;

            // $profileData->save();

            // working code...
            // $file = $request->file('profilePicture');
            // $extension = $file->getClientOriginalExtension();
            // $filename = time() . '.' . $extension;
            // $file->move('uploads/admin/', $filename);
            // $profileData->photo = $filename;

            # old image delete

            // if($oldPhotoPath && file_exists(public_path('uploads/admin/' . $oldPhotoPath))){
            //     unlink(public_path('uploads/admin/' . $oldPhotoPath));
            // }

            // if($oldPhotoPath && $oldPhotoPath !== $ImageUrl && file_exists(public_path('uploads/admin/' . $oldPhotoPath))){
            //     unlink(public_path('uploads/admin/' . $oldPhotoPath));
            // }
            
            if($oldPhotoPath && $oldPhotoPath !== $ImageUrl){
                $this->deleteOldImage($oldPhotoPath);
                
                // unlink(public_path('uploads/admin/' . $oldPhotoPath));
            }

        }


        // return $request->photo;

        $profile->address = $request->address;
        $profile->role = $request->role;
        $profile->updated_at = now();
        $profile->save();

        return redirect()->back()->with('success','Profile Updated Successfully');
    }



    private function deleteOldImage(string $oldPhotoPath): void
    {
        $fullPath = public_path('uploads/admin/' . $oldPhotoPath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    # ChangePassword
    public function ChangePassword(){
        return view('backend.profile.change-password');
    }

    # UpdatePassword
    public function UpdatePassword(Request $request){
        // validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();
        // Check Old Password
        if(!Hash::check($request->old_password, $user->password)){
            return back()->with('error','Old Password Does Not Match');
        }

        // Update The New Password
        User::whereId($user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // change password after logout
        Auth::logout();

        // more code
        // $user->password = Hash::make($request->new_password);
        // $user->save();

        return redirect()->route('login')->with('success','Password Changed Successfully');


        // // Match The Old Password
        // if(!Hash::check($request->old_password, auth()->user()->password)){
        //     return back()->with('error','Old Password Does Not Match');
        // }

        // // Update The New Password
        // User::whereId(auth()->user()->id)->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        // return back()->with('success','Password Changed Successfully');
    }
}
