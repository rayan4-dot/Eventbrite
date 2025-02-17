<?php

namespace App\migrations;

use App\Core\Application;

class m0015
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS tickets (
            id SERIAL PRIMARY KEY,
            userId INTEGER NOT NULL,
            eventId INTEGER NOT NULL,
            FOREIGN KEY (userId) REFERENCES users(id),
            FOREIGN KEY (eventId) REFERENCES events(id)
        )");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE IF EXISTS  tickets");
    }
}