<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function remove($key) : void
    {
        unset($_SESSION[$key]);
    }
}