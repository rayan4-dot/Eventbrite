<?php

namespace App\migrations;

use App\Core\Application;
class m0008
{
    public function up() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("CREATE TABLE IF NOT EXISTS regionCities (
            cityId INTEGER,
            regionId INTEGER
        )");
    }

    public function down() : void
    {
        $db = Application::$app->db->conn;
        $db->exec("DROP TABLE regionCities");
    }
}