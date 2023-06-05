<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Videogallary;
use App\Models\Livetv;
use Image;

class videoGalleryController extends Controller
{
    public function videoGallery(){

        $video = Videogallary::latest()->get();
        return view('backend.video.all_video',compact('video'));
    }

    public function addVideo(){

        return view('backend.video.add_video');
    }//end of method

    public function storeVideo(Request $request){
        $validateData = $request->validate([

            'video_title'=>'required|unique:videogallaries',
            'video_url'=>'required|unique:videogallaries',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $gen_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/videogallery/'.$gen_name);
            $save_url = 'upload/videogallery/'.$gen_name;

            Videogallary::insert([
                'video_title'=>$validateData['video_title'],
                'video_url'=>$validateData['video_url'],
                'video_image'=>$save_url,
                'post_date'=> Carbon::now()->format('d F Y'),
            ]);
        }

        $notification = array(

                'message'=>'New video added successfully',
                'alert-type'=>'success',
            );
        return redirect()->route('video.gallary')->with($notification);
        
    }//end of method

    public function editVideo($id){

        $image = Videogallary::findorFail($id);

        return view('backend.video.edit_video',compact('image'));
    }//end of method

    public function updateVideo(Request $request){

        $imageid = $request->id;
        $validateData = $request->validate([

            'video_title'=>'required|unique:videogallaries,video_title,'.$imageid,
            'video_url'=>'required|unique:videogallaries,video_url,'.$imageid,
        ]);
        if ($request->file('image')) {
            $image = $request->file('image');
            $currentimg = Videogallary::findorFail($imageid);
            $previmage = $currentimg->video_image;
            @unlink(public_path($previmage));
            $gen_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/videogallery/'.$gen_name);
            $save_url = 'upload/videogallery/'.$gen_name;

            Videogallary::findOrFail($imageid)->update([
                'video_title'=>$validateData['video_title'],
                'video_url'=>$validateData['video_url'],
                'video_image'=>$save_url,
            ]);

             $notification = array(

                'message'=>'video added successfully with image',
                'alert-type'=>'success',
            );
        return redirect()->back()->with($notification);

        }else{

            Videogallary::findOrFail($imageid)->update([
                'video_title'=>$validateData['video_title'],
                'video_url'=>$validateData['video_url'],
                
            ]);

             $notification = array(

                'message'=>'video added successfully without image',
                'alert-type'=>'info',
            );
        return redirect()->back()->with($notification);
        }
        

    }//end method

    public function deleteVideo($id){

        $imageid = Videogallary::findorFail($id);

        $previmage = $imageid->video_image;
        @unlink($previmage);

        Videogallary::findorFail($id)->delete();

        $notification = array(

                'message'=>'video deleted successfully',
                'alert-type'=>'danger',
            );
        return back()->with($notification);

    }//end of method

    public function updateLiveTv(){

        $tvid = Livetv::findorFail(1);

        return view('backend.livetv.update_tv',compact('tvid'));
    }//end of method

    public function storeliveTv(Request $request){

        $live = $request->id;

        $validateData = $request->validate([
            'live_url'=>'required|unique:livetvs,live_url,'.$live,
        ]);

        if ($request->file('live_image')) {
            $image = $request->file('live_image');
            $previousimg = Livetv::findorFail($live);
            $preimage = $previousimg->live_image;
            @unlink(public_path($preimage));
            $gen_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/livetv/'.$gen_name);
            $save_url = 'upload/livetv/'.$gen_name;

            Livetv::findorFail($live)->update([

                'live_image'=>$save_url,
                'live_url'=>$validateData['live_url'],
                'post_date'=>Carbon::now()->format('d F Y'),

            ]);

            $notification = array(

                'message'=>'Live tv updated successfully with image',
                'alert-type'=>'success',
            );
        return back()->with($notification);

        }else{
            Livetv::findorFail($live)->update([

                'live_url'=>$validateData['live_url'],
                'post_date'=>Carbon::now()->format('d F Y'),

            ]);

            $notification = array(

                'message'=>'Live tv updated successfully without image',
                'alert-type'=>'success',
            );
        return back()->with($notification);

        }
    }//end of method

}
