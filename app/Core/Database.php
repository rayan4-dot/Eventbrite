<?php
    
    namespace App\Core;

    use PDO;
    use PDOException;

    class Database {
        private static $conn;
        private static $instance = null;
    
        private $host = 'host.docker.internal';  
        private $db = 'Eventbit_DB';  
        private $user = 'user';  
        private $pass = 'root_password';  
        private $port = 5432;
    
        private function __construct() {
            try {
                $dsn = "pgsql:host=$this->host;dbname=$this->db;port=$this->port";
                self::$conn = new PDO($dsn, $this->user, $this->pass);  
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    
        public static function getInstance() {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }
    
        public static function getConnection() {
            return self::$conn;
        }
    
 
    }