<?php

namespace App\Controllers;

use App\Services\PayPalService;
use App\Services\StripeService;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Event;

class PaymentController
{
    protected $paypalService;
    protected $stripeService;

    public function __construct()
    {
        $this->paypalService = new PayPalService();
        $this->stripeService = new StripeService(); 
    }

    public function createPayment(Request $request, Response $response)
    {

        $eventId = $_GET['event_id'] ?? null;


        if (!$eventId) {
            $response->setStatusCode(400);
            echo "Event ID is missing.";
            return;
        }


        $eventDetails = $this->getEventDetails($eventId);


        if (!$eventDetails) {
            $response->setStatusCode(404);
            echo "Event not found.";
            return;
        }

        $amount = $eventDetails['price'];
        $currency = 'USD';
        $description = 'Ticket for ' . $eventDetails['name'];


        $paymentMethod = $_POST['payment_method'] ?? null; 

        if ($paymentMethod === 'paypal') {

            $returnUrl = 'http://yourwebsite.com/payment/success?event_id=' . $eventId;
            $cancelUrl = 'http://yourwebsite.com/payment/cancel?event_id=' . $eventId;


            $payment = $this->paypalService->createPayment($amount, $currency, $description, $returnUrl, $cancelUrl);


            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $approvalUrl = $link->getHref();
                    break;
                }
            }

            if (isset($approvalUrl)) {
                header("Location: {$approvalUrl}");
                exit;
            } else {
                $response->setStatusCode(500);
                echo "Error in payment creation.";
            }
        } elseif ($paymentMethod === 'stripe') {

            try {
                $paymentIntent = $this->stripeService->createPaymentIntent($amount * 100, $currency);
                echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
            } catch (\Exception $e) {
                $response->setStatusCode(500);
                echo "Error creating Stripe payment: " . $e->getMessage();
            }
        } else {
            $response->setStatusCode(400);
            echo "Invalid payment method.";
        }
    }

    public function executePayment(Request $request, Response $response)
    {

        $paymentId = $_GET['paymentId'] ?? null;
        $payerId = $_GET['PayerID'] ?? null;

        if ($paymentId && $payerId) {

            $result = $this->paypalService->executePayment($paymentId, $payerId);


            $eventId = $_GET['event_id'] ?? null;
            $event = $this->getEventDetails($eventId);

            if ($result->getState() == 'approved') {
                echo "Payment successful! You have successfully purchased a ticket for " . $event['name'];

            } else {
                $response->setStatusCode(400);
                echo "Payment failed. Please try again.";
            }
        } else {

            $paymentIntentId = $_POST['payment_intent'] ?? null;

            if ($paymentIntentId) {

                $result = $this->stripeService->retrievePaymentIntent($paymentIntentId);

                if ($result->status === 'succeeded') {
                    $eventId = $_POST['event_id'] ?? null; 
                    $event = $this->getEventDetails($eventId);
                    echo "Payment successful! You have successfully purchased a ticket for " . $event['name'];

                } else {
                    $response->setStatusCode(400);
                    echo "Payment failed. Please try again.";
                }
            } else {
                $response->setStatusCode(400);
                echo "Payment Intent ID is missing.";
            }
        }
    }

    private function getEventDetails($eventId)
    {

        $event = Event::findById($eventId);


        if ($event) {
            return [
                'name' => $event->title, 
                'price' => $event->price  
            ];
        }


        return null;
    }
}