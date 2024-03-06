<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\Subscription\PlanController;
use App\Http\Controllers\Subscription\SubscriptionController;

use App\Http\Controllers\Account\AccountController;

use App\Http\Controllers\Account\Subscriptions\SubscriptionController as AccountSubscriptionController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCancelController as AccountSubscriptionCancelController;
use App\Http\Controllers\Account\Subscriptions\SubscriptionCardController as AccountSubscriptionCardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
});

Route::middleware('subscribed')->group(function(){
    Route::group(['namespace' => 'Subscriptions','as'=>'subscriptions.'], function () {
        Route::get('plans', [PlanController::class, 'index'])->name('plans');
        Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions');
        Route::post('subscriptions', [SubscriptionController::class, 'store']);
    });
});


Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('account');

    Route::middleware('not.subscribed')->group(function(){
        Route::group(['namespace' => 'Subscriptions', 'prefix' => 'subscriptions'], function () {
            Route::get('/', [AccountSubscriptionController::class, 'index'])->name('account.subscription');    
            Route::get('/cancel', [AccountSubscriptionCancelController::class, 'index'])->name('account.subscription.cancel');
            Route::post('/cancel', [AccountSubscriptionCancelController::class, 'store']);        
            Route::post('/resume', [AccountSubscriptionCancelController::class, 'resume'])->name('account.subscription.resume');
            
            Route::get('/edit-card', [AccountSubscriptionCardController::class, 'index'])->name('account.subscription.edit_card');
            Route::get('/edit-card/{id}', [AccountSubscriptionCardController::class, 'edit'])->name('account.subscription.edit_card.item');
            Route::post('/edit-card/{id}', [AccountSubscriptionCardController::class, 'edit_store']);
            Route::get('/edit-card/{id}/remove', [AccountSubscriptionCardController::class, 'remove'])->name('account.subscription.edit_card.remove');
        });
    });

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/test', [TestController::class ,'test']);


require __DIR__.'/auth.php';
