<?php


namespace App\migrations;
use App\Core\Application;


class m0011
{
    public function up() : void
    {
        $db = Application::$app->db->conn;

        $db->exec("CREATE TYPE user_status AS ENUM ('active', 'blocked');");

    
        $db->exec("ALTER TABLE users ADD COLUMN status user_status DEFAULT 'active';");
    }

    public function down() : void 
    {
        $db = Application::$app->db->conn;

        $db->exec("ALTER TABLE users DROP COLUMN status;");

        $db->exec("DROP TYPE IF EXISTS user_status;");
    }
}
