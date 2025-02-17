<?php


namespace App\Controllers;

class PaymentCancelController
{
    public function index()
    {

        $eventId = $_GET['event_id'] ?? null;


        echo "<h1>Payment Canceled</h1>";
        echo "<p>Your payment has been canceled.</p>";
        if ($eventId) {
            echo "<p>You were attempting to purchase a ticket for event ID: <strong>" . htmlspecialchars($eventId) . "</strong>.</p>";
        }

        echo '<p><a href="/events">Return to Events</a></p>';
    }
}


$controller = new PaymentCancelController();
$controller->index();