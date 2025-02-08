<?php

namespace App\Core;

use App\Core\Http\Request;
use App\Core\Http\Response;

class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;

    public function __construct(string $root_path, array $config)
    {
        self::$ROOT_PATH = $root_path;
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router($this->request, $this->response);
        $this->view = new View;
    }

    public function run() : void
    {
        echo $this->router->resolve();
    }
}