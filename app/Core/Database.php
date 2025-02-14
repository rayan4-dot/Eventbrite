<?php
    
namespace App\Core;

class Database
{
    public \PDO $conn;
    public function __construct(array $config)
    {
        $dsn = "{$config['db']['driver']}:host={$config['db']['host']};port={$config['db']['port']};dbname={$config['db']['db_name']}";
        try {
            $this->conn = new \PDO($dsn, $config['db']['username'], $config['db']['password'], $config['db']['options']);
        }
        catch(\PDOException $e) {
            var_dump("Database connection error: " . $e->getMessage());

            dump("Database connection error: " . $e->getMessage());
        }
    }

    public function createMigrationTable() : void
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS migrations (
            id SERIAL PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );";
            $this->conn->exec($sql);
        }
        catch(\PDOException $e) {
            dump($e->getMessage());
        }
    }

    public function applyMigrations() : void
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_PATH . '/app/migrations');
        $notAppliedMigrations = array_diff($files, $appliedMigrations);

        foreach($notAppliedMigrations as $migration) {
            if($migration === '.' || $migration === '..') { continue; }

            $className = pathinfo($migration, PATHINFO_FILENAME);
            $namespace = "App\\Migrations\\" . $className;

            $instance = new $namespace;
            $instance->up();
            $newMigrations[] = $migration;
        }
        if(!empty($newMigrations)) {
            $this->saveMigration($newMigrations);
        }
    }

    public function getAppliedMigrations() : array
    {
        $stmt = $this->conn->prepare("SELECT migration FROM migrations;");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigration(array $migrations) : void
    {
        $stmt = $this->conn->prepare("INSERT INTO migrations (migration) VALUES (:migration)");
        foreach($migrations as $migration) {
            $stmt->execute(['migration' => $migration]);
        }
    }
}