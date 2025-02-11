<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Login;
use App\Models\User;


class AdminController extends controller
{

    public function dashboard(Request $request)
    {

        $this->render('admin/dashboard');
    }

}