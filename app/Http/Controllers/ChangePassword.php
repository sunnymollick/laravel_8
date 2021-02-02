<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller{
    public function changePassword(){
        return view('admin.pages.change_password');
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashed_password = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashed_password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification=array(
                'messege'=>'Successfully password changed',
                'alert-type'=>'success'
                );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Password not updated',
                'alert-type'=>'alert'
                );
            return redirect()->back()->with($notification);
        }
    }

    public function updateProfile(){
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.pages.update_profile',['user'=>$user]);
            }
        }
    }

    public function updateProfileInfo(Request $request){

            $user = User::find(Auth::user()->id);

            if($request->file('profile_photo_path')){
                $image = $request->file('profile_photo_path');

                $image_name = hexdec(uniqid());
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $path = 'uploads/profile/';
                $image_url =  $path.$image_full_name;
                $image->move($path,$image_full_name);
                unlink($user->profile_photo_path);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->profile_photo_path = $image_url;
                $user->save();

                $notification=array(
                    'messege'=>'Successfully Profile Updated',
                    'alert-type'=>'success'
                    );
                return redirect()->back()->with($notification);

            }else{
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                $notification=array(
                    'messege'=>'Successfully Profile Updated',
                    'alert-type'=>'success'
                    );
                return redirect()->back()->with($notification);

            }

    }
}
