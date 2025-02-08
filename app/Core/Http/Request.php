<?php

namespace App\Core\Http;

class Request
{
    public function getPath() : string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');
        if(!$pos) {
            return $path;
        }
        return substr($path, 0, $pos);
    }

    public function method() : string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet() : bool
    {
        return $this->method() === 'get';
    }

    public function isPost() : bool
    {
        return $this->method() === 'post';
    }

    public function getBody() : array
    {
        $body = [];
        if($this->isGet()) {
            foreach($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost()) {
            foreach($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}