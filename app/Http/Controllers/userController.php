<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class userController extends Controller
{
 
    public function userDashboard(){

        $id =Auth::user()->id;
        $userdata = User::find($id);
        return view('frontend.userdashboard.dashboard',compact('userdata'));
    }//end of method

    public function updateProfile(Request $request){
        $id =Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();


        return back()->with('status',"profile updated successfully");

    }//end of method

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('status',"You have successfully logout");
    }//end of method

    public function userChangePassword(){
        $id =Auth::user()->id;
        $userdata = User::find($id);

        return view('frontend.userdashboard.change_password',compact('userdata'));
    }//end of method

    public function userUpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);

        if (!Hash::check($request->old_password,Auth::user()->password)) {
            return back()->with('error',"old password does not match");
        }

        User::whereId(Auth::user()->id)->update([

            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('status',"password updated successfully");
    }
}
