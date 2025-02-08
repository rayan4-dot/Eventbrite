<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(Application::$ROOT_PATH . '/app/views');
        $this->twig = new Environment($loader);
    }
    public function renderView(string $view, array $params = []) : void
    {
        echo $this->twig->render("$view.html.twig", $params);
    }
}