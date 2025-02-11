<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function dashboard() : void
    {
        $this->render('/admin/dashboard');
    }

    public function users() : void
    {
        $this->render('/admin/users');
    }
}