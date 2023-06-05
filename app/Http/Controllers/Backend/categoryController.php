<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Carbon;

class categoryController extends Controller
{
    public function allCategory(){

        $categories = Category::latest()->get();

        return view('backend.category.all_category',compact('categories'));

    }//end method

    public function addCategory(){

        return view('backend.category.add_category');
    }//end of method

    public function storeCategory(Request $request){

       $validateData = $request->validate([

            'category_name'=>'required|unique:categories|max:255'
        ]);

        Category::insert([
            'category_name'=>$validateData['category_name'],
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Category added successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.category')->with($notification);
    }//end of method

    public function editCategory($id){
        $category = Category::findorFail($id);
        return view('backend.category.category_edit',compact('category'));

    }//end of method

    public function updateCategory(Request $request){
        
        $categoryid = $request->id;

        $validateData = $request->validate([

            'category_name'=>'required|unique:categories,category_name,'.$categoryid,
        ]);


        Category::findorFail($categoryid)->update([

            'category_name'=>$validateData['category_name'],
            'category_slug'=>strtolower(str_replace(' ','-',$request->category_name)),

        ]);

        $notification = array(
            'message'=>'Category updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.category')->with($notification);

    }//end of method

    
    public function deleteCategory($id)
{
    $subcategory_id = Subcategory::where('category_id', $id)->get();

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category has subcategories and cannot be deleted',
            'alert-type' => 'danger',
        );


    return redirect()->route('all.category')->with($notification);
}//end of method

    public function getSubcategory($category_id){

        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }//end of method
}
