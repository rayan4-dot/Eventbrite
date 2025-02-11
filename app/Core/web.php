<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/dashboard', [AdminController::class, 'dashboard']);

