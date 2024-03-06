<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
//

class SubscriptionController extends Controller
{
     //
     public function index(Request $request){
        $request->validate([
            'plan' => 'required'
        ]);

        $plan = Plan::where('slug', $request->plan)->first();


        return view('subscriptions.checkout', [
            'intent' => $request->user()->createSetupIntent(),
            'plan' => $plan
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'token' => 'required'
        ]);

        $plan = Plan::where('slug', $request->plan)->orWhere('slug', 'monthly')->first();

        $request->user()->newSubscription(
            'default',
            $plan->stripe_id
        )->create($request->token);

        return redirect()->route('account.subscription'); 

    }
}
