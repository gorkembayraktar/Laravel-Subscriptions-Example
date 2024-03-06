<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request){
        
        $subscriptions = $request->user()->subscriptions->map(function($item){
            
            $item->confirm_start_date = \Carbon\Carbon::parse(
                $item->created_at 
            )->toFormattedDateString();
            $item->confirm_end_date =  \Carbon\Carbon::createFromTimeStamp(
                $item->ends_at ?? $item->asStripeSubscription()->current_period_end
            )->toFormattedDateString();

            return $item;
        });

        return view('account.index', compact('subscriptions'));
    }
}
