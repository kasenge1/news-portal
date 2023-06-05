<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class adminController extends Controller
{
    public function adminDashboard(){
        return view('admin.index');
    }//end of a method

     public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message'=>'Admin logout successfully',
            'alert-type'=>'info'
        );

        return redirect('admin/logout/page')->with($notification);
    }//end of method

    public function adminLogin(){
        return view('admin.admin_login');
    }//end of method

    public function adminLogoutPage(){
        return view('admin.admin_logout');
    }//end of a method

    public function adminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.profile.admin_profile',compact('adminData'));
    }//end of method

    public function adminProfileStore(Request $request){

        $id = Auth::user()->id;
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
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(

            'message'=>'Admin profile updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }//end of method

    public function adminChangePassword(){

        return view('admin.profile.admin_change_password');
    }//end method

    public function adminUpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);

        //match old passwod

        if (!Hash::check($request->old_password,Auth::user()->password)) {
            return back()->with('error',"old password does not match!!");
        }
        //update the new password

        User::whereId(Auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)

        ]);

        return back()->with('status',"password changed successfully");
    }//end of method


    ///////////////////////////////////////////////////////////

    public function allAdmin(){
        $alladmins = User::where('role','admin')->latest()->get();

        return view('backend.admin.all_admins',compact('alladmins'));
    }//end of methed

    public function addAdmin(){
        $roles = Role::all();
        return view('backend.admin.add_admin',compact('roles'));
    }//end of method

    public function storeadmin(Request $request){

        $validateData = $request->validate([

            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'password'=>'required|min:6',

        ]);

        $user = new User();
        $user ->name = $validateData['name'];
        $user ->username = $validateData['username'];
        $user ->email = $validateData['email'];
        $user ->phone = $validateData['phone'];
        $user ->password = Hash::make($validateData['password']);
        $user->role = "admin";
        $user->status = "inactive";
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message'=>'new admin user added successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }//end of method

    public function editAdmin(Request $request,$id){
        $user = User::findorFail($id);
        $roles = Role::all();

        return view('backend.admin.edit_admin',compact('user','roles'));
    }//end of method

    public function updateAdmin(Request $request){

        $admin_id = $request->id;

         $validateData = $request->validate([

            'name'=>'required',
            'username'=>'required|unique:users,username,'.$admin_id,
            'email'=>'required|unique:users,email,'.$admin_id,
            'phone'=>'required|unique:users,phone,'.$admin_id,

        ]);
        

        $user = User::findorFail($admin_id);
        $user ->name = $validateData['name'];
        $user ->username = $validateData['username'];
        $user ->email = $validateData['email'];
        $user ->phone = $validateData['phone'];
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message'=>'Admin updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }//end of method

    public function deleteAdmin($id){

        $user_id = User::findorFail($id);
        $image = $user_id->photo;
        @unlink(public_path('upload/user_images/'.$image));

        if (!is_null($user_id)) {
            $user_id->delete();
        }

        $notification = array(
            'message'=>'Admin deleted successfully',
            'alert-type'=>'info'
        );

        return redirect()->route('all.admin')->with($notification);

    }//end of method

    public function deactivateAdmin($id){
        User::findorFail($id)->update(['status'=>'inactive']);

        $notification = array(
            'message'=>'Admin deactivated successfully',
            'alert-type'=>'danger'
        );

        return redirect()->route('all.admin')->with($notification);
    }//end of method

    public function activateAdmin($id){
        User::findorFail($id)->update(['status'=>'active']);

        $notification = array(
            'message'=>'Admin activated successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }
}
