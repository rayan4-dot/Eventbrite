<?php

namespace App\migrations;

use App\Core\Application;

class m0004
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS categories (
            id SERIAL PRIMARY KEY,
            name TEXT NOT NULL,
            description TEXT
        )");

    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE categories");
    }
}