<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function home() : void
    {
        $this->render('home');
    }
}