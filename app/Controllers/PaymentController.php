<?php

namespace App\Controllers;

use App\Services\PayPalService;
use App\Core\Http\Request;
use App\Core\Http\Response;

class PaymentController
{
    protected $paypalService;

    public function __construct()
    {
        $this->paypalService = new PayPalService();
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
    }

    public function executePayment(Request $request, Response $response)
    {
        // Fetch paymentId and PayerID from the query parameters
        $paymentId = $_GET['paymentId'] ?? null;
        $payerId = $_GET['PayerID'] ?? null;

        // Ensure required parameters are present, otherwise return an error
        if (!$paymentId || !$payerId) {
            $response->setStatusCode(400);
            echo "Payment ID or Payer ID is missing.";
            return;
        }

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
    }

    private function getEventDetails($eventId)
    {
        // Use the Event model to fetch event details from the database
        $event = \App\Models\Event::findById($eventId);
    
        // Check if the event was found
        if ($event) {
            return [
                'name' => $event->title, // Assuming 'title' is the event name
                'price' => $event->price  // Assuming 'price' is the event price
            ];
        }
    
        // Return null or throw an exception if the event is not found
        return null;
    }
}