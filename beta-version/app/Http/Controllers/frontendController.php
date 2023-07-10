<?php

namespace App\Http\Controllers;

use App\Models\Blog_Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class frontendController extends Controller
{
    //========== home =============//
    function home(){
        $blogposts = Blog_Posts::all();
        return view('frontend.index', [
            'blogposts'=>$blogposts,
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

    // =========== blogs ============//
    function blogs(){
        $blogs = Blog_Posts::all();
        return view('frontend.blogs', [
            'blogs'=>$blogs,
        ]);
    }

    // =========== single_blog ============//
    function single_blog($id){
        $single_blogs = Blog_Posts::find($id);
        return view('frontend.single_blog', [
            'single_blogs'=>$single_blogs,
        ]);
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
