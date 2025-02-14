<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;

$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/dashboard', [AdminController::class, 'dashboard']);


$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/events/create', [EventController::class, 'create']);
$app->router->post('/events/create', [EventController::class, 'create']);

$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/admin/users', [AdminController::class, 'users']);
$app->router->get('/admin/categories', [CategoryController::class, 'create']);
$app->router->get('/admin/approve-user/{id}', [AdminController::class, 'approveUser']);
$app->router->get('/admin/reject-user/{id}', [AdminController::class, 'rejectUser']);
$app->router->post('/admin/block-user/{id}', [AdminController::class, 'blockUser']);
$app->router->post('/admin/unblock-user/{id}', [AdminController::class, 'unblockUser']);

