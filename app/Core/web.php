<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\PaymentController;
use App\Controllers\PaymentSuccessController;
use App\Controllers\PaymentCancelController;

$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

// $app->router->get('/events/create', [EventController::class, 'create']);
// $app->router->post('/events/create', [EventController::class, 'create']);

$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/admin/users', [AdminController::class, 'users']);
$app->router->get('/admin/categories', [CategoryController::class, 'create']);
$app->router->post('/admin/categories', [CategoryController::class, 'create']);

$app->router->get('/admin/categories/edit/{id}', [CategoryController::class, 'edit']);
$app->router->post('/admin/categories/edit/{id}', [CategoryController::class, 'edit']);

$app->router->post('/admin/categories/delete/{id}', [CategoryController::class, 'delete']);
$app->router->get('/payment/create', [PaymentController::class, 'createPayment']);
$app->router->get('/payment/success', [PaymentController::class, 'executePayment']);
$app->router->get('/payment/cancel', function () {
    // handle payment cancellation
    echo "Payment cancelled.";
});


$router->get('/payment/success', [PaymentSuccessController::class, 'index']);
$router->get('/payment/cancel', [PaymentCancelController::class, 'index']);