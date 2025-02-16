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
    public function login(Request $request, Response $response): void
    {

        if (Application::$app->session->get('user')) {
            $response->redirect('/');
            return;
        }//nta déjà authentifié w baghi trja3 l'page dial login hhh


        $login = new Login();
        if ($request->isPost()) {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->render('auth/login', ['model' => $login]);
    }

    public function logout(): void
    {
        Application::$app->logout();
        Application::$app->response->redirect('/');
    }

    public function register(Request $request): void
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->register()) {
                Application::$app->login($user); // autologin after registration
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->render('auth/register', ['model' => $user]);
    }
}
