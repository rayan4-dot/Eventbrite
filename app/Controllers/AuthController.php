<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Login;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response) : void
    {
        $login = new Login();
        if($request->isPost()) {
            $login->loadData($request->getBody());
            if($login->validate() && $login->login()) {
                $response->redirect('/');
            }
        }
        $this->render('auth/login', ['model' => $login]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->register()) {
                Application::$app->response->redirect('/');
            }
            $errors = $user->getErrors();
        }
        $this->render('auth/register', ['model' => $user]);
    }
}