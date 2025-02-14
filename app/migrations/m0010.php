<?php

namespace App\migrations;

use App\Core\Application;

class m0010
{
    public function up()
    {
        $db = Application::$app->db->conn;
        $db->exec("ALTER TABLE cities ADD COLUMN regionId INT");
        $db->exec("ALTER TABLE cities ADD CONSTRAINT fk_region FOREIGN KEY (regionId) REFERENCES regions(id) ON DELETE CASCADE");
    }
}