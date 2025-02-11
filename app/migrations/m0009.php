<?php

namespace App\migrations;

use App\Core\Application;

class m0009
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TYPE status AS ENUM('draft', 'published');");
        $db->exec("CREATE TABLE IF NOT EXISTS events (
            id SERIAL PRIMARY KEY,
            title TEXT NOT NULL,
            description TEXT NOT NULL,
            categoryId INTEGER,
            organiserId INTEGER,
            picture TEXT,
            price NUMERIC,
            cityId INTEGER,
            type  status DEFAULT 'draft',
            eventDate DATE NOT NULL,
            capacity INTEGER NOT NULL,
            duration INTEGER,
            likes INTEGER DEFAULT 0,
            dislikes INTEGER DEFAULT 0
        )");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLES events;");
    }
}