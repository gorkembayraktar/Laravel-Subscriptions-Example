<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{
    public function index(){
        return view('account.subscription.cancel');
    }
    
    public function store(Request $request){
        // abonelik henüz iptal edilmediyse işleme devam et
        $this->authorize('cancel', $request->user());

        $subs = $request->user()->subscription('default');
        $subs->cancel();

        return redirect()->route('account.subscription');
    }

    public function resume(Request $request){
        // abonelik iptal edildiyse işleme devam et
        $this->authorize('resume', $request->user());

        $subs = $request->user()->subscription('default');
        $subs->resume();
        return redirect()->route('account.subscription');
    }
}
