<?php

namespace App\migrations;

use App\Core\Application;
class m0002
{
    public function up(): void
    {
        $db = Application::$app->db->conn;
        $db->exec("INSERT INTO roles (name, description) VALUES 
            ('admin', 'This role has full access'),
            ('user', 'This role has limited access can only participate events'),
            ('organiser', 'This has access to create events and participate events')
        ;");
    }

    public function down(): void
    {
        $db = Application::$app->db->conn;
        $db->exec("DELETE FROM roles;");
    }
}
