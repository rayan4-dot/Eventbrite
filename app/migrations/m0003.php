<?php

namespace App\migrations;

use App\Core\Application;

class m0003
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            firstName TEXT NOT NULL,
            lastName TEXT NOT NULL,
            email TEXT NOT NULL,
            password TEXT NOT NULL,
            role_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (role_id) REFERENCES roles(id)
        );");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE users");
    }
}