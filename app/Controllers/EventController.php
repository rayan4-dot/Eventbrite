<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\F2FEvent;
use App\Models\OnlineEvent;

class EventController extends Controller
{
    public function create(Request $request, Response $response) : void
    {
        $event = null;
        $data = $request->getBody();
        $type = $data['type'];

        if($type === 'remote') {
            $event = new OnlineEvent();
        }
        else if($type === 'f2f') {
            $event = new F2FEvent();
        }

            dump("hello");
        if($request->isPost()) {
            $event->loadData($data);
            if($event->validate() && $event->save()) {
                $response->redirect('/');
            }
        }

        $this->render('events/create', ['model' => $event]);
    }
}