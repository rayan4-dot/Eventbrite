<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Ticket;
use App\Models\Event;

class TicketController extends Controller
{
    public function showAll() : void
    {
        $this->render('/user/tickets');
    }

    public function show(Request $request, Response $response, array $params = [])
    {
        $ticketId = $params[0];
        $this->render('/user/ticket', ['ticketId' => $ticketId]);
    }

    public function getAllTickets()
    {
        $tickets = Ticket::getAllTickets();
        header('Content-Type: application/json');
        echo json_encode($tickets);
        exit;
    }

    public function getTicketById(Request $request, Response $response, array $params = [])
    {
        $id = $params[0];
        $ticket = Ticket::getById($id);
        header('Content-Type: application/json');
        echo json_encode($ticket);
        exit;
    }

    public function downloadTicket(Request $request, Response $response, array $params = []): void
    {
        // Retrieve the ticket ID from the dynamic route parameter
        $ticketId = $params[0] ?? null;
        if (!$ticketId) {
            $response->setStatusCode(400);
            echo "Ticket ID is missing";
            exit;
        }

        // Retrieve the ticket record
        $ticket = Ticket::findOne(['id' => $ticketId]);
        if (!$ticket) {
            $response->setStatusCode(404);
            echo "Ticket not found";
            exit;
        }

        // Retrieve additional information as needed, for example:
        $result = Ticket::getById($ticketId);
        $html = "
            <html>
        <head>
            <style>
                body { font-family: 'DejaVu Sans', sans-serif; margin: 0; padding: 0; }
                .ticket {
                    width: 100%;
                    max-width: 600px;
                    margin: 20px auto;
                    border: 2px solid #333;
                    padding: 20px;
                    background: #f7f7f7;
                }
                .ticket-header {
                    text-align: center;
                    background: #333;
                    color: #fff;
                    padding: 10px;
                    margin-bottom: 20px;
                }
                .ticket-header h1 {
                    margin: 0;
                    font-size: 28px;
                }
                .ticket-header h2 {
                    margin: 5px 0 0;
                    font-size: 20px;
                }
                .ticket-info {
                    font-size: 16px;
                    margin-bottom: 10px;
                    line-height: 1.5;
                }
                .ticket-info strong {
                    display: inline-block;
                    width: 120px;
                }
                .ticket-footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 14px;
                    color: #555;
                }
            </style>
        </head>
        <body>
            <div class='ticket'>
                <div class='ticket-header'>
                    <h1>Event Ticket</h1>
                    <h2>Ticket #{$ticketId}</h2>
                </div>
                <div class='ticket-info'>
                    <strong>Event:</strong> {$result['title']}<br>
                    <strong>Date:</strong> {$result['eventdate']}<br>
                    <strong>Location:</strong> {$result['location']}<br>
                </div>
                <div class='ticket-info'>
                    <strong>Holder:</strong> {$result['fullname']}<br>
                    <strong>Code:</strong> #23213
                </div>
                <div class='ticket-footer'>
                    Please present this ticket at the event entrance.
                </div>
            </div>
        </body>
    </html>
        ";

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=ticket_{$ticketId}.pdf");
        echo $dompdf->output();
        exit;
    }
}