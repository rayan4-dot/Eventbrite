<?php

namespace App\Controllers;

use App\Models\Event;
use App\Core\Http\Response;

class PaymentSuccessController
{
    public function index()
    {

        $eventId = $_GET['event_id'] ?? null;


        if (!$eventId) {
            echo "Event ID is missing.";
            return;
        }


        $event = Event::findById($eventId);


        if (!$event) {
            echo "Event not found.";
            return;
        }


        echo "<h1>Payment Successful!</h1>";
        echo "<p>Thank you for your purchase!</p>";
        echo "<p>You have successfully purchased a ticket for <strong>" . htmlspecialchars($event->title) . "</strong>.</p>";
        echo "<p>Price: $" . htmlspecialchars($event->price) . "</p>";

    }
}


$controller = new PaymentSuccessController();
$controller->index();
