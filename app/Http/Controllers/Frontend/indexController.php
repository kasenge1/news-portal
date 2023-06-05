<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Newspost;
use Illuminate\Support\Facades\Session;
use App;
use DateTime;

class indexController extends Controller
{
    public function Index(){

        $latestnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $popularnews = Newspost::orderBy('view_count','DESC')->limit(10)->get();

        $skip_cat_0 = Category::skip(0)->first();
        $skip_news_0 = Newspost::where('status',1)->where('category_id',$skip_cat_0->id)->orderBy('id','DESC')->limit(5)->get();

        $skip_cat_1 = Category::skip(1)->first();
        $skip_news_1 = Newspost::where('status',1)->where('category_id',$skip_cat_1->id)->orderBy('id','DESC')->limit(6)->get();

        return view('Frontend.index',compact('latestnews','popularnews','skip_cat_0','skip_news_0','skip_cat_1','skip_news_1'));
    }//end of method

    public function newsDetails($id,$slug){

        $newsdetails = Newspost::findOrFail($id);
        $tags = $newsdetails->tags;
        $all_tags = explode(',',$tags);

        $cat_id = $newsdetails->category_id;
        $relatednews = Newspost::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(6)->get();

        $newskey = 'blog' . $newsdetails->id;
        if (!Session::has($newskey )) {
            $newsdetails->increment('view_count');
            Session::put($newskey,1);
        }

        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();


        return view('frontend.news.news_details',compact('newsdetails','all_tags','relatednews','newnews','newspopular'));

    }//end of method

    public function catWiseNews($id,$slug){

        $categorynews = Newspost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
        $breadcrumb = Category::where('id',$id)->first();
        $newstwo = Newspost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->limit(2)->get();
        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();
        return view('frontend.news.category_news',compact('categorynews','breadcrumb','newstwo','newnews','newspopular'));

    }//end of method

    public function catWiseSubcategory($id,$slug){
        $subcategorynews = Newspost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
        $breadcrumb = Subcategory::where('id',$id)->first();
        $newstwo = Newspost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->limit(2)->get();

        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();

        return view('frontend.news.subcategory_news',compact('subcategorynews','newstwo','breadcrumb','newnews','newspopular'));
    }//end of method

    public function change(Request $request){

        App::setLocale($request->lang);
        session()->put('lang',$request->lang);

        return redirect()->back();
    }//end of method

    public function SearchByDate(Request $request){
        $date = new DateTime($request->date);
        $dateFormat = $date->format('d-m-Y');
        $news = Newspost::where('post_date',$dateFormat)->latest()->get();
        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();
        return view('frontend.news.search_by_date',compact('news','dateFormat','newnews','newspopular'));

    }// end of method

    public function newsSearch(Request $request){

        $item = $request->search;
        $news = Newspost::where('news_title', 'LIKE', "%$item%")->get();
        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();

        return view('frontend.news.search',compact('news','item','newnews','newspopular'));

    }//end method

    public function reporterNews($id){
        $reporter = User::findOrFail($id);
        $news = Newspost::where('user_id',$id)->latest()->get();
        $newnews = Newspost::orderBy('id','DESC')->limit(10)->get();
        $newspopular = Newspost::orderBy('view_count','DESC')->limit(10)->get();

        return view('frontend.news.reporter_news',compact('reporter','news','newnews','newspopular'));

    }//end of method
}
