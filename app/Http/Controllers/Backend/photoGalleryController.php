<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Photogallery;
use Image;

class photoGalleryController extends Controller
{
    public function photoGallery(){

        $photo = PhotoGallery::latest()->get();

        return view('backend.photo.all_photo',compact('photo'));
    }//end of method

    public function addGallery(){

        return view('backend.photo.add_photo');
    }//end of method

    public function storeGallery(Request $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(700,400)->save('upload/gallery/'.$name_gen);
            $save_url = 'upload/gallery/'.$name_gen;

            PhotoGallery::insert([
                'photo_gallery'=>$save_url,
                'post_date'=> Carbon::now()->format('d F Y'),
            ]);
        }

        $notification = array(
            'message'=>'Gallery added successfully',
            'alert-type'=>'success',

        );
        return redirect()->route('photo.gallary')->with($notification);
    }//end of method

    public function editGallery($id){

        $photogal = PhotoGallery::findorFail($id);

        return view('backend.photo.edit_photo',compact('photogal'));

    }//end of method

    public function updateGallery(Request $request){

        $photoid = $request->id;

        $image = $request->file('photo');
        $currImage = PhotoGallery::findorFail($photoid);
        @unlink(public_path($currImage->photo_gallery));

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(700,400)->save('upload/gallery/'.$name_gen);
        $save_url = 'upload/gallery/'.$name_gen;

        PhotoGallery::findorFail($photoid)->update([

            'photo_gallery'=>$save_url,
        ]);
        $notification = array(
            'message'=>'Photo Gallery updated successfully',
            'alert-type'=>'success',

        );
        return redirect()->route('photo.gallary')->with($notification);
    }//end of method

    public function deleteGallery($id){

        $image = PhotoGallery::findorFail($id);

        $currentimage = $image->photo_gallery;
        @unlink($currentimage);

        PhotoGallery::findorFail($id)->delete();

        $notification = array(
            'message'=>'Photo Gallery deleted successfully',
            'alert-type'=>'info',

        );
        return redirect()->route('photo.gallary')->with($notification);
    }//end of method
}
