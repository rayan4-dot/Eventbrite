<?php

namespace App\Services;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payer;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ItemList;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PayPalService
{
    protected $apiContext;

    public function __construct()
    {
        $config = include __DIR__ . '/../../Core/Payment.php';
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($config['client_id'], $config['secret'])
        );
        $this->apiContext->setConfig($config['settings']);
    }

    public function createPayment($amount, $currency, $description, $returnUrl, $cancelUrl)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amountObj = new Amount();
        $amountObj->setCurrency($currency)
                  ->setTotal($amount);

        $transaction = new Transaction();
        $transaction->setAmount($amountObj)
                    ->setDescription($description);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($returnUrl)
                     ->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            return $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo "Error: " . $ex->getMessage();
            exit;
        }
    }

    public function executePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            return $payment->execute($execution, $this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo "Error: " . $ex->getMessage();
            exit;
        }
    }
}
