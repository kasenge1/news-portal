<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Backend\bannercontroller;
use Image;

class bannercontroller extends Controller
{
    public function allBanner(){
        $banner = Banner::findorFail(1);

        return view('backend.banner.banner_update',compact('banner'));

    }//end method

    public function updateBanner(Request $request){

        $banner_id = $request->id;

        if ($request->file('home_one')) {
            $image1= $request->file('home_one');
            $home_one_banner = Banner::findorFail($banner_id);
            $previous_home_one_banner = $home_one_banner->home_one;
            @unlink(public_path($previous_home_one_banner));
            $name_gen1 = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(725,100)->save('upload/banner/'.$name_gen1);
            $save_url1 = 'upload/banner/'.$name_gen1;

            Banner::findorFail($banner_id)->update([
                'home_one' => $save_url1,
            ]);

            $notification = array(
                'message' => 'Home one banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if

         if ($request->file('home_two')) {
            $image2= $request->file('home_two');
            $home_two_banner = Banner::findorFail($banner_id);
            $previous_home_two_banner = $home_two_banner->home_two;
            @unlink(public_path($previous_home_two_banner));
            $name_gen2 = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(725,100)->save('upload/banner/'.$name_gen2);
            $save_url2 = 'upload/banner/'.$name_gen2;

            Banner::findorFail($banner_id)->update([
                'home_two' => $save_url2,
            ]);

            $notification = array(
                'message' => 'Home two banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if

         if ($request->file('home_three')) {
            $image3= $request->file('home_three');
            $home_three_banner = Banner::findorFail($banner_id);
            $previous_home_three_banner = $home_three_banner->home_three;
            @unlink(public_path($previous_home_three_banner));
            $name_gen3 = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(725,100)->save('upload/banner/'.$name_gen3);
            $save_url3 = 'upload/banner/'.$name_gen3;

            Banner::findorFail($banner_id)->update([
                'home_three' => $save_url3,
            ]);

            $notification = array(
                'message' => 'Home three banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if

         if ($request->file('home_four')) {
            $image4= $request->file('home_four');
            $home_four_banner = Banner::findorFail($banner_id);
            $previous_four_banner = $home_four_banner->home_four;
            @unlink(public_path($previous_home_four_banner));
            $name_gen4 = hexdec(uniqid()).'.'.$image4->getClientOriginalExtension();
            Image::make($image4)->resize(725,100)->save('upload/banner/'.$name_gen4);
            $save_url4 = 'upload/banner/'.$name_gen4;

            Banner::findorFail($banner_id)->update([
                'home_four' => $save_url4,
            ]);

            $notification = array(
                'message' => 'Home four banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if

         if ($request->file('news_category_one')) {
            $image5= $request->file('news_category_one');
            $news_category_one_banner = Banner::findorFail($banner_id);
            $previous_news_category_one_banner = $news_category_one_banner->news_category_one;
            @unlink(public_path($previous_news_category_one_banner));
            $name_gen5 = hexdec(uniqid()).'.'.$image5->getClientOriginalExtension();
            Image::make($image5)->resize(725,100)->save('upload/banner/'.$name_gen5);
            $save_url5 = 'upload/banner/'.$name_gen5;

            Banner::findorFail($banner_id)->update([
                'news_category_one' => $save_url5,
            ]);

            $notification = array(
                'message' => 'News category one banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if

        if ($request->file('news_details_one')) {
            $image6= $request->file('news_details_one');
            $news_details_one_banner = Banner::findorFail($banner_id);
            $previous_news_details_one_banner = $news_details_one_banner->news_details_one;
            @unlink(public_path($previous_news_details_one_banner));
            $name_gen6 = hexdec(uniqid()).'.'.$image6->getClientOriginalExtension();
            Image::make($image6)->resize(725,100)->save('upload/banner/'.$name_gen6);
            $save_url6 = 'upload/banner/'.$name_gen6;

            Banner::findorFail($banner_id)->update([
                'news_details_one' => $save_url6,
            ]);

            $notification = array(
                'message' => 'News details one banner updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }//end if








    }//end of method
}
