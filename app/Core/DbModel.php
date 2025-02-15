<?php

namespace App\Core;

abstract class DbModel extends Model
{
    abstract public function getTableName();
    abstract public function getAttributes();
    abstract public function getPrimaryKey();

    public function save()
    {
        $table = $this->getTableName();
        $attributes = $this->getAttributes();
        $columns = implode(',', $attributes);
        $placeholders = implode(',', array_fill(0, count($attributes), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders);";
        $stmt = $this->prepare($sql);
        $values = [];
        foreach($attributes as $attribute) {
            $values[] = $this->{$attribute};
        }
        return $stmt->execute($values); 
    }

    public function update(int $id, array $data): bool
    {
        $table = $this->getTableName();
        $columns = array_keys($data);
        $setClause = implode(', ', array_map(fn($col) => "$col = :$col", $columns));
        $sql = "UPDATE $table SET $setClause WHERE id = :id";
        $stmt = self::prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public static function findOne(array $where)
    {
        $tableName = (new static())->getTableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }

    public static function getAll() : array
    {
        $tableName = (new static)->getTableName();
        $stmt = self::prepare("SELECT * FROM $tableName");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function find(array $conditions): array
    {
        $tableName = (new static)->getTableName();
        $attributes = array_keys($conditions);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public function update()
    {
        $table = $this->getTableName();
        $attributes = $this->getAttributes();
        $primaryKey = $this->getPrimaryKey(); // Add this abstract method

        // Remove primary key from attributes to update
        $attributesToUpdate = array_filter($attributes, fn($attr) => $attr !== $primaryKey);

        $setStatements = implode(', ', array_map(fn($attr) => "$attr = ?", $attributesToUpdate));

        $sql = "UPDATE $table SET $setStatements WHERE $primaryKey = ?";
        $stmt = $this->prepare($sql);

        // Get values for SET parameters
        $values = [];
        foreach ($attributesToUpdate as $attribute) {
            $values[] = $this->{$attribute};
        }

        // Add primary key value for WHERE clause
        $values[] = $this->{$primaryKey};

        return $stmt->execute($values);
    }


    public function getDb(): Database
    {
        return Application::$app->db;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->conn->prepare($sql);
    }

}