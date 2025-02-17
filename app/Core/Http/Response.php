<?php

namespace App\Core\Http;

class Response
{
    public function setStatusCode(int $code) : void
    {
        http_response_code($code);
    }

    public function redirect(string $path) : void
    {   
        header('Location: ' . $path);
    }

    public function json(array $data, int $statusCode = 200): void
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }


}