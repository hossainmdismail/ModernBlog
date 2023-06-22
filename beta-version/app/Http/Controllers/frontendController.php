<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class frontendController extends Controller
{
    //========== home =============//
    function home(){
        return view('frontend.index');
    }


    // =========== about ============//
    function about(){
        return view('frontend.about');
    }

    // =========== contact ============//
    function contact(){
        return view('frontend.contact');
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
