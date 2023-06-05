<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newspost;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class newsPostcontroller extends Controller
{
    public function allNews(){

        $allnews = Newspost::latest()->get();

        return view('backend.news.all_news',compact('allnews'));
    }//end of method

    public function addNews(){

        $newscategory = Category::latest()->get();
        $newssubcategory = Subcategory::latest()->get();
        $adminuser = User::where('role','admin')->latest()->get();
        return view('backend.news.add_news',compact('newscategory','newssubcategory','adminuser'));
    }//end of method

    public function storeNews(Request $request){

        $validateData = $request->validate([

            'category_id'=>'required',
            'user_id'=>'required',
            'news_title'=>'required|unique:newsposts',
            'news_details'=>'required',
            'tags'=>'required',

        ]);

        
            $file = $request->file('image');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(784,436)->save('upload/news_images/'.$filename);
            $save_url = 'upload/news_images/'.$filename;

            Newspost::insert([

                'category_id'=>$validateData['category_id'],
                'subcategory_id'=>$request->subcategory_id,
                'user_id'=>$validateData['user_id'],
                'news_title'=>$validateData['news_title'],
                'news_slug_title'=>strtolower(str_replace(' ','-',$request->news_title)),
                'news_details'=>$validateData['news_details'],
                'tags'=>$validateData['tags'],
                'breaking_news'=>$request->breaking_news,
                'top_slider'=>$request->top_slider,
                'first_section_three'=>$request->first_section_three,
                'first_section_nine'=>$request->first_section_nine,
                'post_date'=>date('d-m-Y'),
                'post_month'=>date('F'),
                'image'=>$save_url,
                'created_at'=>Carbon::now(),
                
            ]);

            $notification = array(
                'message'=>"News post inserted successfully",
                'alert-type'=>'success'
            );

            return redirect()->route('all.news')->with($notification);
        
    }//end of method

    public function editNews($id){
        $post = Newspost::findorFail($id);
        $newscategory = Category::latest()->get();
        $categoryid = $post->category_id;
        $newssubcategory = Subcategory::where('category_id',$categoryid)->latest()->get();
        $adminuser = User::where('role','admin')->latest()->get();
        

        return view('backend.news.edit_news',compact('post','newscategory','newssubcategory','adminuser'));
    }//end of method

    public function updateNews(Request $request){

        $postid = $request->id;
        $validateData = $request->validate([
            'news_title'=>'required|unique:newsposts,news_details,'.$postid,
            'news_details'=>'required',
            'tags'=>'required',

        ]);
        
        if ($request->file('image')) {
            $file = $request->file('image');

            $post = Newspost::findOrFail($postid);
            $previousImage = $post->image;
            @unlink(public_path($previousImage));
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(784,436)->save('upload/news_images/'.$filename);
            $save_url = 'upload/news_images/'.$filename;

            Newspost::findorFail($postid)->update([

                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'user_id'=>$request->user_id,
                'news_title'=>$validateData['news_title'],
                'news_slug_title'=>strtolower(str_replace(' ','-',$request->news_title)),
                'news_details'=>$request->news_details,
                'tags'=>$request->tags,
                'breaking_news'=>$request->breaking_news,
                'top_slider'=>$request->top_slider,
                'first_section_three'=>$request->first_section_three,
                'first_section_nine'=>$request->first_section_nine,
                'post_date'=>date('d-m-Y'),
                'post_month'=>date('F'),
                'image'=>$save_url,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message'=>"News post updated successfully with image",
                'alert-type'=>'success'
            );

            return redirect()->route('all.news')->with($notification);
        }else{

            Newspost::findorFail($postid)->update([

                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'user_id'=>$request->user_id,
                'news_title'=>$validateData['news_title'],
                'news_slug_title'=>strtolower(str_replace(' ','-',$request->news_title)),
                'news_details'=>$request->news_details,
                'tags'=>$request->tags,
                'breaking_news'=>$request->breaking_news,
                'top_slider'=>$request->top_slider,
                'first_section_three'=>$request->first_section_three,
                'first_section_nine'=>$request->first_section_nine,
                'post_date'=>date('d-m-Y'),
                'post_month'=>date('F'),
                'updated_at'=>Carbon::now(),
                
                
            ]);

            $notification = array(
                'message'=>"News post updated successfully without image",
                'alert-type'=>'success'
            );

            return redirect()->route('all.news')->with($notification);

        }

    }//end of method

    public function deleteNews($id){

        $newspost = Newspost::findorFail($id);
        $post = $newspost->image;
        @unlink($post);

        Newspost::findorFail($id)->delete();

        $notification = array(
                'message'=>"News post updated successfully without image",
                'alert-type'=>'success'
            );

            return redirect()->back()->with($notification);

    }//end of method

    public function deactivateNews($id){

        Newspost::findorFail($id)->update([
            'status'=> 0,
        ]);

        $notification = array(
                'message'=>"News post deactivated successfully",
                'alert-type'=>'info'
            );

            return redirect()->back()->with($notification);
    }//end of method

    public function activateNews($id){

        Newspost::findorFail($id)->update([
            'status'=> 1,
        ]);

        $notification = array(
                'message'=>"News post activated successfully",
                'alert-type'=>'info'
            );

            return redirect()->back()->with($notification);
    }//end of method
}
