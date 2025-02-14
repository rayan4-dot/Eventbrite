<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\F2FEvent;
use App\Models\OnlineEvent;
use App\Models\Event;

class EventController extends Controller
{
    public function index($id) : void
    {
        $this->render('/events/index');
    }
    public function create(Request $request, Response $response): void
    {
        $event = new F2FEvent();
        if ($request->isPost()) {
            $data = $request->getBody();
            $data['capacity'] = (int)$data['capacity'];
            $data['price'] = (float)$data['price'];
            $data['cityId'] = isset($data['cityId']) ? (int)$data['cityId'] : null;

            // handle the image upload
            if (isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) {
                $eventImg = $_FILES['picture']['name'];
                $temp_file = $_FILES['picture']['tmp_name'];
                $folder = __DIR__  . "/../../public/assets/uploads/$eventImg";
                if(move_uploaded_file($temp_file, $folder)) {
                    $data['picture'] = "/uploads/$eventImg";
                }
            }


            $type = $data['type'] ?? '';
            if ($type === 'online') {
                $event = new OnlineEvent();
            }
            $event->loadData($data);
            if ($event->validate() && $event->save()) {
                $response->redirect('/');
            }

        }
//        dump($event); die;
        $this->render('events/create', ['model' => $event, 'errors' => $event->getErrors()]);
    }

    public function getAllEvents() : void
    {
        $events = Event::getAll();
        echo json_encode($events);
    }
}