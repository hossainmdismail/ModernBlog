<?php

namespace App\Http\Controllers;

use App\Models\Blog_Posts;
use App\Models\Category;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class frontendController extends Controller
{
    //========== home =============//
    function home(){
        //Premium recent
        $premiumRecent = Blog_Posts::select('id','title','photo','created_at')
        ->where('premium', 'premium')
        ->where('status',1)
        ->orderBy('id','DESC')
        ->get()
        ->take(4);
        //premiumTop
        $premiumTop = Blog_Posts::select('id','title','photo','created_at')
        ->where('premium', 'premium')
        ->where('status',1)
        ->orderBy('views','DESC')
        ->get()
        ->take(3);
        //popular
        $popular = Blog_Posts::select('id','title','photo','created_at')
        ->where('premium', 'free')
        ->where('status',1)
        ->orderBy('views','DESC')
        ->get()
        ->take(4);
        //popular
        $recent = Blog_Posts::select('id','title','photo','category_id','user_id','created_at')
        ->where('premium', 'free')
        ->where('status',1)
        ->orderBy('id','DESC')
        ->get()
        ->take(4);

        // category
        $categorys = Category::all();

        return view('frontend.index', [
            'premiumRecents'=>$premiumRecent,
            'premiumTops'=>$premiumTop,
            'populars'=>$popular,
            'recents'=>$recent,
            'categorys'=>$categorys,
        ]);
    }


    // =========== about ============//
    function about(){
        return view('frontend.about');
    }

    // =========== contact ============//
    function contact(){
        return view('frontend.contact');
    }

    // =========== category ============//
    function category_post($id){
        $categorys = Category::find($id);
        $blog_post = Blog_Posts::where('category_id', $id)->get();
        return view('frontend.category', [
            'categorys'=>$categorys,
            'blog_post'=>$blog_post,
        ]);
    }


    // =========== blogs ============//
    function blogs(){
        $blogs = Blog_Posts::all();
        return view('frontend.blogs', [
            'blogs'=>$blogs,
        ]);
    }

    // =========== single_blog ============//
    function single_blog($id){
        if (Auth::check()) { //Checking if user login
            if (Subscriptions::where('user_id',Auth::user()->id)->exists()) {
                $subscription_date = Subscriptions::select('end_date')->where('user_id',Auth::user()->id)->first()->end_date;
                $today = date('2023-07-22');
                if ($today > $subscription_date) { //check users for subscription date
                    Alert::toast('Your Subscription Date has Expired','error');
                    return redirect()->route('subscription'); //Redirect with alert message if user subscription date expired
                }else { //Give permission to user
                    $single_blogs = Blog_Posts::find($id);
                    $category = Category::select('id','name')->get();

                    $key = 'Blog_'.$single_blogs->id;
                    if(!session()->has($key)){
                        $single_blogs->increment('views');
                        session()->put($key,1);
                    }

                    return view('frontend.single_blog', [
                        'single_blogs'=>$single_blogs,
                        'category'=>$category,
                    ]);
                }
            }else{
                return redirect()->route('subscription'); //Redirect if  user not subscribed
            }
        }else{
            return redirect()->route('subscription'); //Redirect if not an user
        }
    }

    //============ Login =============//
    function login(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials,$request->filled('remember'))) {
            Alert::toast('Success Toast','success');
            return back();
        }else {
            Alert::toast('Success Toast','error');
            return back();
        }

        // print_r($request->all());
        // $request->validate([
        //     'email'         => 'required|email',
        //     'password'      => 'required',
        // ]);

    }

        //========== user profile =============//
        function user_profile(){
            return view('frontend.profile');
        }

}
