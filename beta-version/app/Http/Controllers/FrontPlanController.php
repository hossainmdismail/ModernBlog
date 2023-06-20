<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPlanController extends Controller
{
    //============= subscription ================
    function subscription(){
        return view('frontend.layouts.subscription');
    }

    //============= subscription_pay ================
    function subscription_pay(){
        return view('frontend.layouts.subscription_pay');
    }
}
