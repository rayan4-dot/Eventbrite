<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Application;

class HomeController extends Controller
{
    public function home() : void
    {
        $session = Application::$app->session->get('user');
        $isLoggedIn = isset($session);
        $this->render('home', ['isLoggedIn' => $isLoggedIn]);
    }
}