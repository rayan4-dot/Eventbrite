<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

$config = [];

$config['db'] = require_once __DIR__ . '/../app/config/database.php';

$app = new Application(dirname(__DIR__), $config);
require_once __DIR__ . '/../app/core/web.php';

$app->db->applyMigrations();

$app->run();