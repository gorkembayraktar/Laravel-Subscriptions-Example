<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Customer;

class SubscriptionController extends Controller
{
    public function index(Request $request){
        /*
        $user = Auth::user();
       
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        dd($stripe->customers->allPaymentMethods($user->stripe_id,['limit' => 3,'type' => 'card']));
       */
       
        

        return view('account.subscription.index');
    }
}
