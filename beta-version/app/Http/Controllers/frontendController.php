<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
