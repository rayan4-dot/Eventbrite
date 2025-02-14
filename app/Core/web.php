<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\RegionController;
use App\Controllers\CityController;
use App\Controllers\SponsorController;

$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

//$app->router->get('/events', [EventController::class, 'index']);
$app->router->get('/events/{id}', [EventController::class, 'index']);
$app->router->get('/events/create', [EventController::class, 'create']);
$app->router->post('/events/create', [EventController::class, 'create']);

$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/admin/users', [AdminController::class, 'users']);
$app->router->get('/admin/categories', [CategoryController::class, 'create']);

$app->router->get('/api/categories', [CategoryController::class, 'getAllCategories']);
$app->router->get('/api/regions', [RegionController::class, 'getAllRegions']);
$app->router->get('/api/cities', [CityController::class, 'getRegionCities']);
$app->router->get('/api/sponsors', [SponsorController::class, 'getAllSponsors']);
$app->router->get('/api/sponsors', [SponsorController::class, 'create']);
//$app->router->get('/api/events', [EventController::class, 'getAllEvents']);
