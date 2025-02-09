<?php

namespace App\Core;

class Controller
{
    public function render(string $view, array $params = []) : void
    {
        Application::$app->view->renderView($view, $params);
    }
}