<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Event;
use App\Models\Booking;
use App\Models\Ticket;

class BookingController extends Controller
{
    public function bookEvent(Request $request, Response $response, array $params = []): void
    {

        $session = Application::$app->session;
        if (!$session->get('user')) {
            $response->setStatusCode(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "You must log in to book a ticket"]);
            exit;
        }

        $userId = $session->get('user');

        $eventId = $request->post('eventId');
        $quantity = (int)$request->post('quantity');

        if (!$eventId) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "Event ID is missing"]);
            exit;
        }
        if ($quantity <= 0) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "Invalid ticket quantity"]);
            exit;
        }

        $event = Event::findById($eventId);
        if (!$event) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "Event invalid"]);
            exit;
        }

        if ($quantity > $event->capacity) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "Only {$event->capacity} tickets available"]);
            exit;
        }

        // Check if the user has already booked this event
        $existingBooking = Booking::findOne(['userId' => $userId, 'eventId' => $eventId]);
        if ($existingBooking) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => "You have already booked this event"]);
            exit;
        }
        $booking = new Booking();
        $booking->loadData($request->getBody());
        $booking->userId = $userId;
        $booking->eventId = $eventId;
        $booking->price = $event->price;
        $booking->totalPrice = $event->price * $quantity;

        if ($booking->validate() && $booking->save()) {
            for($i = 0; $i < $quantity; $i++) {
                $ticket = new Ticket();
                $ticket->userId = $userId;
                $ticket->eventId = $eventId;
                $ticket->save();
            }
            $event->capacity -= $quantity;
            $event->update();

            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => "Event booked successfully"]);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'errors' => $booking->getErrors()]);
            exit;
        }
    }


}
