<?php

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__) . '/../');
$dotenv->load();

return [
    'driver' => 'pgsql',
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['PORT'],
    'db_name' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];