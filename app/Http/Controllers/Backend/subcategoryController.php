<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Carbon;

class subcategoryController extends Controller
{
    public function allSubcategories(){

        $subcategories = Subcategory::latest()->get();
        return view('backend.subcategory.all_subcategory',compact('subcategories'));
    }//end of method

    public function addSubcategories(){

        $categories = Category::latest()->get();
        return view('backend.subcategory.add_subcategory',compact('categories'));
    }//end of method

    public function storeSubcategories(Request $request){

        $validateData = $request->validate([

            'subcategory_name'=>'required|unique:subcategories|max:255'
        ]);
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$validateData['subcategory_name'],
            'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),
            'created_at'=>Carbon::now(),
        ]);

         $notification = array(
            'message'=>'subCategory added successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.subcategories')->with($notification);
    }//end method

    public function editSubcategories($id){
        $categories = Category::latest()->get();
        $subcategory = Subcategory::findorFail($id);

        return view('backend.subcategory.edit_subcategory',compact('subcategory','categories'));
    }//end of method

    public function updateSubcategory(Request $request){

        $subcategoryid = $request->id;

        $validateData = $request->validate([

            'subcategory_name'=>'required|unique:subcategories,subcategory_name,'.$subcategoryid,
        ]);

        Subcategory::findorFail($subcategoryid)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$validateData['subcategory_name'],
            'subcategory_slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),
        ]);

         $notification = array(
            'message'=>'subCategory updated successfully',
            'alert-type'=>'info'
        );

        return redirect()->route('all.subcategories')->with($notification);

    }//end of method

    public function deleteSubcategories($id){

        Subcategory::findorFail($id)->delete();
        $notification = array(
            'message'=>'subCategory deleted successfully',
            'alert-type'=>'danger'
        );

        return back()->with($notification);
    }


}
