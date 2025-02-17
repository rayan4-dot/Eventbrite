<?php

namespace App\Controllers;

use App\Services\PayPalService;
use App\Services\StripeService; // Make sure to create this service
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
        $this->stripeService = new StripeService(); // Initialize Stripe service
    }

    public function createPayment(Request $request, Response $response)
    {
        // Fetch event_id from the query parameters
        $eventId = $_GET['event_id'] ?? null;

        // Ensure event_id exists, otherwise return an error
        if (!$eventId) {
            $response->setStatusCode(400);
            echo "Event ID is missing.";
            return;
        }

        // Fetch event details from the database
        $eventDetails = $this->getEventDetails($eventId);

        // Check if the event details were retrieved successfully
        if (!$eventDetails) {
            $response->setStatusCode(404);
            echo "Event not found.";
            return;
        }

        $amount = $eventDetails['price'];
        $currency = 'USD';
        $description = 'Ticket for ' . $eventDetails['name'];

        // Determine which payment method to use
        $paymentMethod = $_POST['payment_method'] ?? null; // Assuming you have a form field for this

        if ($paymentMethod === 'paypal') {
            // Define return and cancel URLs for PayPal
            $returnUrl = 'http://yourwebsite.com/payment/success?event_id=' . $eventId;
            $cancelUrl = 'http://yourwebsite.com/payment/cancel?event_id=' . $eventId;

            // Create payment using PayPalService
            $payment = $this->paypalService->createPayment($amount, $currency, $description, $returnUrl, $cancelUrl);

            // Redirect to PayPal approval URL
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
            // Create a payment intent using StripeService
            try {
                $paymentIntent = $this->stripeService->createPaymentIntent($amount * 100, $currency); // Amount in cents
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
        // Handle PayPal payment execution
        $paymentId = $_GET['paymentId'] ?? null;
        $payerId = $_GET['PayerID'] ?? null;

        if ($paymentId && $payerId) {
            // Capture the payment and confirm the transaction
            $result = $this->paypalService->executePayment($paymentId, $payerId);

            // Fetch event details for confirmation
            $eventId = $_GET['event_id'] ?? null;
            $event = $this->getEventDetails($eventId);

            if ($result->getState() == 'approved') {
                echo "Payment successful! You have successfully purchased a ticket for " . $event['name'];
                // Optionally record the payment in your database here
            } else {
                $response->setStatusCode(400);
                echo "Payment failed. Please try again.";
            }
        } else {
            // Handle Stripe payment confirmation
            $paymentIntentId = $_POST['payment_intent'] ?? null; // Assuming you send this from the frontend

            if ($paymentIntentId) {
                // Verify the payment intent with Stripe
                $result = $this->stripeService->retrievePaymentIntent($paymentIntentId);

                if ($result->status === 'succeeded') {
                    $eventId = $_POST['event_id'] ?? null; // Get event ID from the request
                    $event = $this->getEventDetails($eventId);
                    echo "Payment successful! You have successfully purchased a ticket for " . $event['name'];
                    // Optionally record the payment in your database here
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
        // Use the Event model to fetch event details from the database
        $event = Event::findById($eventId);

        // Check if the event was found
        if ($event) {
            return [
                'name' => $event->title, // Assuming 'title' is the event name
                'price' => $event->price  // Assuming 'price' is the event price
            ];
        }

        // Return null if the event is not found
        return null;
    }
}