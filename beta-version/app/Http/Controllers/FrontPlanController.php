<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontPlanController extends Controller
{
    //============= subscription ================
    function subscription(){
        $data = Plans::all();
        return view('frontend.layouts.subscription',['plans' => $data]);
    }

    //============= subscription_pay ================
    function subscription_pay($id){
        $data = ['plan' => $id];
        $plan = Plans::find($id);
        if (Auth::check()) {
            return redirect()->route('stripe.link',['data'=>$data]);
        }else{
            return view('frontend.layouts.subscription_pay',['plan'=>$plan]);
        }
    }

    function subscription_checkout(Request $request){
        if (Auth::check()) {
            echo Auth::user()->id;
        }else{
            echo 'Not Logged in';
        }
        die();
        $request->validate([
            'plan' => 'required|integer',
            'name' => 'required|string',
            'number' => 'required',
            'address' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // should check if email exist
        $data = $request->all();
        return redirect()->route('stripe.link',['data'=>$data]);
        // return view('stripe.stripe',['data' => $data]);

        // $plan = Plans::find($request->plan);

        // $subscriptions = null;
        // if ($plan->type == 'years') {
        //     $subscriptions = Carbon::now()->addYears($plan->duration);
        // }elseif ($plan->type == 'month') {
        //     $subscriptions = Carbon::now()->addMonths($plan->duration);
        // }elseif ($plan->type == 'day') {
        //     $subscriptions = Carbon::now()->addDays($plan->duration);
        // }



    }


        //============= pay success ================
        function pay_success(){
            return view('frontend.pay_success');
        }
}
