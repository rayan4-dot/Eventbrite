<?php

namespace App\migrations;

use App\Core\Application;

class m0006
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS cities (
                id SERIAL PRIMARY KEY,
                name TEXT NOT NULL
            )");

    }
    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE cities");
    }
}