<?php

namespace App\migrations;

use App\Core\Application;

class m0014
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS bookings (
            id SERIAL PRIMARY KEY,
            eventId INTEGER NOT NULL,
            userId INTEGER NOT NULL,
            date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            quantity INTEGER,
            totalPrice NUMERIC,
            FOREIGN KEY (eventId) REFERENCES events(id),
            FOREIGN KEY (userId) REFERENCES users(id)
        )");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLES bookings;");
    }
}