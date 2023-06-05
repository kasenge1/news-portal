<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class roleController extends Controller
{
    public function allPermission(){

        $permission = Permission::all();

        return view('backend.pages.permission.all_permission',compact('permission'));

    }//end of method

    public function addPermission(){

        return view('backend.pages.permission.add_permission');

    }//end of method

    public function storePermission(Request $request){

        $validateData = $request->validate([

            'name'=>'required|unique:permissions',
            'group_name'=>'required',
        ]);

        $role = Permission::create([

            'name'=>$validateData['name'],
            'group_name'=>$validateData['group_name']

        ]);

        $notification =  array(

            'message'=>'permission added successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('all.permission')->with($notification);

    }//end method

    public function editPermission($id){

        $permission = Permission::findOrFail($id);
        $group = Permission::all();
        return view('backend.pages.permission.edit_permission',compact('permission','group'));
    }//end of method

    public function updatePermission(Request $request){

        $per_id = $request->id;
        $validateData = $request->validate([

            'name'=>'required|unique:permissions,name,'.$per_id,
            'group_name'=>'required',
        ]);

        Permission::findOrFail($per_id)->update([

            'name'=>$validateData['name'],
            'group_name'=>$validateData['group_name'],

        ]);

         $notification =  array(

            'message'=>'permission updated successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('all.permission')->with($notification);


    }//end of method

    public function deletePermission($id){

        Permission::findOrFail($id)->delete();

        $notification =  array(

            'message'=>'permission deleted successfully',
            'alert-type'=>'info',
        );

        return redirect()->back()->with($notification);
    }//end of method

    public function allRoles(){

        $allroles = Role::all();

        return view('backend.pages.roles.all_roles',compact('allroles'));
    }//end method

    public function addRoles(){

        return view('backend.pages.roles.add_roles');
    }//end method

    public function storeRoles(Request $request){

        $validateData = $request->validate([

            'name'=>'required|unique:roles',
        ]);

        $role = Role::create([

            'name'=>$validateData['name'],
        ]);

        $notification =  array(

            'message'=>'Role added successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }//end of method

    public function editRoles($id){

        $roleid = Role::findOrFail($id);

        return view('backend.pages.roles.edit_roles',compact('roleid'));

    }//end of method

    public function updateRoles(Request $request){

        $role = $request->id;

        $validateData = $request->validate([

            'name'=>'required|unique:roles,name,'.$role,
        ]);
        Role::findOrFail($role)->update([ 

            'name'=>$validateData['name'],
        ]);

        $notification = array(

            'message'=>'role update successfully',
            'alert-type'=>'info',
        );

        return redirect()->route('all.roles')->with($notification);

    }//end of method

    public function deleteRoles($id){

        Role::findOrFail($id)->delete();

        $notification =  array(

            'message'=>'Role deleted successfully',
            'alert-type'=>'info',
        );

        return redirect()->back()->with($notification);

    }//end of method

///////////////////add roles for permission /////////////////////////
    public function addRolesPermission(){
        $roles = Role::all();
        $permission = Permission::all();
        $permission_group = User::getpermissionGroup();
        return view('backend.pages.roles.add_roles_permissions',compact('roles','permission','permission_group'));
    }//end of method

    public function storeRolesPermission(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id']=$request->role_id;
            $data['permission_id']=$item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message'=>'permission added successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }//end of method

    public function allRolesPermission(){

        $roles = Role::all();

        return view('backend.pages.roles.all_roles_permission',compact('roles'));
    }//end method

    public function eiditRolesPermission($id){

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_group = User::getpermissionGroup();

        return view('backend.pages.roles.edit_roles_permission',compact('role','permissions','permission_group'));
    }//end method

    public function updateRolesPermission(Request $request){
        $id = $request->id;

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message'=>' Role permission updated successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }//end of method

    public function deleteRolesPermission($id){

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

         $notification = array(
            'message'=>' Role permission deleted successfully',
            'alert-type'=>'info',
        );

        return redirect()->back()->with($notification);
    }
}
