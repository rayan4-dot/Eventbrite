<?php

namespace App\Core\Middlewares;

use App\Core\Application;

class AuthMiddleware
{
    private array $protectedRoutes = [];
    private array $adminRoutes = [];

    public function __construct(array $protectedRoutes = [], array $adminRoutes = [])
    {
        $this->protectedRoutes = $protectedRoutes;
        $this->adminRoutes = $adminRoutes;
    }

    public function handle(): void
    {
        $currentPath = Application::$app->request->getPath();
        $user = Application::$app->user;


        if (in_array($currentPath, $this->protectedRoutes, true) && !$user) {
            Application::$app->response->redirect('/login');
            exit;
        }


        if (in_array($currentPath, $this->adminRoutes, true) && (!$user || $user->role_id !== 1)) {
            Application::$app->response->redirect('/');
            exit;
        }
    }
}
