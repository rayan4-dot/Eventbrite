<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY'); 
    }

    public function createPaymentIntent($amount, $currency)
    {
        return PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
        ]);
    }

    public function retrievePaymentIntent($paymentIntentId)
    {
        return PaymentIntent::retrieve($paymentIntentId);
    }
}