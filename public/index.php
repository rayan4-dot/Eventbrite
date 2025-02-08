<?php 


require __DIR__. "/../vendor/autoload.php";

use App\Core\Database;

Database::getInstance();
$stmt = Database::getConnection();
$data = $stmt->prepare("SELECT * FROM users");
$data->execute();
$users = $data->fetchAll(\PDO::FETCH_ASSOC);

print_r($users);