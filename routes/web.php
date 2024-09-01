<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Customer;
use Stripe\Charge;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe','stripe')->name('stripe.index');
    Route::get('stripe/checkout','stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');

});

Route::get('/charge',function(){
    return view('charge');
});


Route::get('/payment',[PaymentController::class,'showPaymentForm'])->name('payment.form');
Route::post('/process-payment',[PaymentController::class,'processPayment'])->name('process.payment');
Route::get('/payment/success', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/payment/failure', function () {
    return view('payment-failure');
})->name('payment.failure');
