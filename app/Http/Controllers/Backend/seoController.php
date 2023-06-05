<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seosettings;
use Illuminate\Support\Carbon;

class seoController extends Controller
{
    public function seoSetting(){
        $seo = Seosettings::findOrFail(1);

        return view('backend.seo.seo_settings',compact('seo'));
    }//end of method

    public function updateSeo(Request $request){

        $seoid = $request->id;


        Seosettings::findOrFail($seoid)->update([
            'meta_title'=>$request->meta_title,
            'meta_author'=>$request->meta_author,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'created_at'=>Carbon::now(),

        ]);

        $notification = array(
            'message'=>'seo settings updated successfully',
            'alert-type'=>'success',
        );

        return back()->with($notification);
    }
}
