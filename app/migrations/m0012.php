<?php
namespace App\migrations;
use App\Core\Application;

class m0012 {

    public function up() : void 
    {
        $db = Application::$app->db->conn;

        $db->exec("CREATE TYPE block_type AS ENUM('blocked', 'unblocked');");

        $db->exec("ALTER TABLE users ADD COLUMN block_status block_type DEFAULT 'unblocked';");
    }

    public function down() : void 
    {
        $db = Application::$app->db->conn;

        $db->exec("ALTER TABLE users DROP COLUMN block_status;");

        $db->exec("DROP TYPE IF EXISTS block_type;");
    }
}
