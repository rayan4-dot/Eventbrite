<?php

namespace App\Models;

use App\Core\DbModel;

class Category extends DbModel
{
    public int $id;
    public string $name = '';
    public ?string $description = null;

    public function getTableName(): string
    {
        return 'categories';
    }

    public function getAttributes(): array
    {
        return ['name', 'description'];
    }

    public function rules(): array
    {
        return [
            'name' => [$this->validator::RULE_REQUIRED]
        ];
    }

    public function updateCategory(int $id, array $data): bool
    {
        return $this->update($id, $data);
    }

    public function deleteCategory(int $id): bool
    {
        return $this->delete($id);
    }

    public static function getAll(): array
    {
        $table = (new static())->getTableName();
        $stmt = self::prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function getById(int $id): ?Category
    {
        return self::findOne(['id' => $id]);
    }
}