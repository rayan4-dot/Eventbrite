<?php

namespace App\migrations;

use App\Core\Application;

class m0013
{
    public function up() : void
    {
        $db = Application::$app->db->conn;

       
        $db->exec("CREATE TABLE IF NOT EXISTS usersasked (
            id SERIAL PRIMARY KEY,
            user_id INT NOT NULL,
            email TEXT NOT NULL,
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL,
            requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        );");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE usersasked");
    }
}
