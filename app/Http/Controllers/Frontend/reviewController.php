<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Notifications\ReviewNotification;
use Illuminate\Support\Facades\Notification;

class reviewController extends Controller
{
    public function storeReview(Request $request){

        $user = User::where('role','admin')->get();

        $news = $request->news_id;

        $request->validate([
            'comment'=>'required',
        ]);

        Review::insert([

            'news_id'=>$news,
            'user_id'=>Auth::id(),
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),
        ]);

        Notification::send($user, new ReviewNotification($request));

        return back()->with("status","Your comment will be approved by admin");
    }//end of method

    public function pendingReview(){

        $pendingreview = Review::where('status',0)->latest()->get();

        return view('backend.review.pending_review',compact('pendingreview'));
    }//end of method

    public function approvedReview(){
        $approvedreview = Review::where('status',1)->latest()->get();

        return view('backend.review.approved_review',compact('approvedreview'));
    }//end of method

    public function activateReview($id){

        Review::findOrFail($id)->update(['status'=>1]);

        $notification = array(

            'message'=>'review approved successfully',
            'alert-type'=>'success',
        );

        return back()->with($notification);

    }//end of method

    public function deactivateReview($id){
        Review::findOrFail($id)->delete();

        $notification = array(

            'message'=>'review deleted successfully',
            'alert-type'=>'info',
        );

        return back()->with($notification);
    }
}
