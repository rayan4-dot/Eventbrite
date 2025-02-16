<?php

namespace App\Core;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\User;

class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public Database $db;
    public ?User $user;
    public Session $session;

    public function __construct(string $root_path, array $config)
    {
        self::$ROOT_PATH = $root_path;
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router($this->request, $this->response);
        $this->view = new View;
        $this->db = new Database($config);
        $this->user = new User;
        $this->session = new Session;
    }

    public function login(User $user) : bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $id = $user->{$primaryKey};
        $this->session->set('user', $id);
        return true;
    }

    public function logout() : void
    {
        $this->user = null;
        $this->session->remove('user');
    }


    public function run() : void
    {
        if (session_status() === PHP_SESSION_NONE ) {  //define('PHP_SESSION_NONE', 1)
            session_start();
        }
    
        $authMiddleware = new \App\Core\Middlewares\AuthMiddleware(
            // ['/events/create', '/dashboard'], // general protected routes
            ['/admin/dashboard', '/admin/users', '/admin/categories'] // admin protected routes
        );
    
        $authMiddleware->handle();
        echo $this->router->resolve();
    }
    

}