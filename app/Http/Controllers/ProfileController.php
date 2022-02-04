<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('user.pages.profile.profile');
    }
    public function edit(){

        return view('user.pages.profile.editprofile');
    }
    public function update(Request $request){

        // Validate primary data
      $errors =  $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
        ]);
        // Validate password if want to change
        if($request->isPasswordChange == 1){

            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'current_password' => ['required', 'string', 'min:6'],
            ]);
        }
        // if old password request current password are not same
        if($request->isPasswordChange == 1){
            $hashedpass = Auth::User()->password; // User Old Password
            if(!Hash::check($request->current_password, $hashedpass)){
                return redirect()->back()->with('error', 'current password not match with your old password');
            }
        }
        // Validate old Password And New Password Are Same
        if($request->isPasswordChange == 1){
            $hashedpass = Auth::User()->password; // User Old Password
            // if old password request current password are same
            if(Hash::check($request->password, $hashedpass)){
                return redirect()->back()->with('error', 'your old and new password is same . please type different one');
            }
        }
        // Validate image if want to profile image
        if($request->image){
            $request->validate([
                'image' =>  'image|mimes:jpeg,png,jpg,gif'
            ]);
        }
        //============= Now Data Update Time ============
        $user = User::FindOrFail(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        // First Check Image
        if($request->image){
            // if Old Image have then delete this (if isnot default one)
            $userOldImage = $user->profile_image_url;
            if(file_exists($userOldImage)){
                if($userOldImage != 'backend/images/default.png'){
                    unlink($userOldImage);
                }
            }
            // image Proccessing For Upload
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('backend/images/'), $imageName);
            // save profile pic
            $lastImage = 'backend/images/'.$imageName;
            $user->profile_image_url = $lastImage;
        }
        // First Check Password
        if($request->password){
             // password change Proccessing
            $user->password = Hash::make($request->password);
        }
        // Finally Save The User
        $user->save();
        return redirect()->back()->with('success', 'Profle Updated !');
    }
}
