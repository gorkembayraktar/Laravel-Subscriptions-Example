<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
class PlanController extends Controller
{
    //
    public function index(){
        $plans = Plan::all();
        return view('subscriptions.plans', ['plans' => $plans]);
    }
}
