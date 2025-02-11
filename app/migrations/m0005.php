<?php

namespace App\migrations;

use App\Core\Application;

class m0005
{
    public function up(): void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS sponsors (
            id SERIAL PRIMARY KEY,
            name TEXT NOT NULL,
            description TEXT,
            logo TEXT
        )");
    }

    public function down(): void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE sponsors");
    }
}