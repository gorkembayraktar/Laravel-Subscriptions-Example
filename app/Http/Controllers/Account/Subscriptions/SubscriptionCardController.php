<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCardController extends Controller
{   

    public function index(Request $request){

        $user = $request->user();
       
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $paymentMethods  = $stripe->customers->allPaymentMethods($user->stripe_id,['limit' => 3,'type' => 'card']);

        //$request->session()->flash('error', 'Ödeme yöntemi başarıyla silindi.');

      
        return view('account.subscription.cards', compact('paymentMethods'));
    }
    public function edit(Request $request, $paymentMethodId){
       // $request->session()->flash('success', 'Form submitted successfully!');
        
       
       return view('account.subscription.cards_edit', [
        'intent' => $request->user()->createSetupIntent(),
        'user' => $request->user(),
        'paymentMethodId' => $paymentMethodId
       ]);
    }

    public function edit_store(Request $request, $paymentMethodId){

    
        $request->validate([
            'token' => 'required'
        ]);

     
        $user = $request->user();

        // Stripe'a yeni ödeme yöntemini ekleyin veya mevcut ödeme yöntemini güncelleyin
        $user->updateDefaultPaymentMethod($request->token);
        $user->deletePaymentMethod($paymentMethodId);
    
        return redirect()->route('account.subscription.edit_card')->with('success', 'Kart başarıyla güncellendi.');
    }
    
    public function remove(Request $request, $paymentMethodId){

        try {
            $user = $request->user();
            $user->deletePaymentMethod($paymentMethodId);

            return redirect()->route('account.subscription.edit_card')->with('success', 'Başarılı şekilde kart kaldırıldı.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ödeme yöntemi silinirken bir hata oluştu: ' . $e->getMessage());
        }
       
    }
}
