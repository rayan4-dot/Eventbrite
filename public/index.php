<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

$app = new Application(dirname(__DIR__), []);
require_once __DIR__ . '/../app/core/web.php';

$app->run();
