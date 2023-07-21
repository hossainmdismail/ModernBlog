<?php

namespace App\Http\Controllers;

use App\Models\Billings;
use App\Models\Plans;
use App\Models\Subscriptions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        //checking day, month, year
        $data    = session('data'); //getting data with sessions
        $plan    = Plans::find($data['plan']); //find plans
        $orderId = 'ORD-' . uniqid(); //making order id

        $subscriptions = null;
            if ($plan->type == 'years') {
                $subscriptions = Carbon::now()->addYears($plan->duration);
            }elseif ($plan->type == 'month') {
                $subscriptions = Carbon::now()->addMonths($plan->duration);
            }elseif ($plan->type == 'day') {
                $subscriptions = Carbon::now()->addDays($plan->duration);
            }
        DB::beginTransaction();
        try {
            // Stripe Payments
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $plan->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from itsolutionstuff.com."
            ]);

            Session::flash('success', 'Payment successful!');

            if (Auth::check()) {
                if (Subscriptions::where('user_id',Auth::user()->id)->exists()) {
                    //subscriber
                    Subscriptions::where('user_id',Auth::user()->id)->update([
                        'plan_id'       => $plan->id,
                        'start_date'    => Carbon::now(),
                        'end_date'      => $subscriptions,
                        'created_at'    => Carbon::now(),
                        'updated_at'    => Carbon::now(),
                    ]);
                }else {
                    //subscriber
                    Subscriptions::create([
                        'user_id'       => Auth::user()->id,
                        'plan_id'       => $plan->id,
                        'start_date'    => Carbon::now(),
                        'end_date'      => $subscriptions,
                        'created_at'    => Carbon::now(),
                    ]);
                }

                //Billings
                $orderId = 'ORD-' . uniqid();
                Billings::insert([
                    'user_id'       => Auth::user()->id,
                    'plans_id'       => $plan->id,
                    'order_id'  => $orderId,
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'status' => 'success',
                    'payment' => $plan->price,
                ]);
            }else{
                //create user
                $user = User::create([
                    'name'          => $data['name'],
                    'email'         => $data['email'],
                    'post_type'     => 'premium',
                    'password'      => bcrypt($data['password']),
                ]);

                //subscriber
                Subscriptions::create([
                    'user_id'       => $user->id,
                    'plan_id'       => $plan->id,
                    'start_date'    => Carbon::now(),
                    'end_date'      => $subscriptions,
                    'created_at'    => Carbon::now(),
                ]);

                //Billings
                $orderId = 'ORD-' . uniqid();
                Billings::insert([
                    'user_id'       => $user->id,
                    'plans_id'       => $plan->id,
                    'order_id'  => $orderId,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'number' => $data['number'],
                    'address' => $data['address'],
                    'country' => $data['country'],
                    'status' => 'success',
                    'payment' => $plan->price,
                ]);
            }


            DB::commit();
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th);
            return redirect()->route('pay.success');
        }

    }
}
