<?php
namespace App\Models;

use App\Core\DbModel;

class Sponsor extends DbModel
{
    public int $id;
    public string $name = '';
    public string $logo = ''; // URL or file path for the sponsor logo

    public function getTableName(): string
    {
        return 'sponsors';
    }

    public function getAttributes(): array
    {
        return ['name', 'logo'];
    }

    public function rules(): array
    {
        return [
            'name' => [$this->validator::RULE_REQUIRED],
        ];
    }

    public static function allSponsors(): array
    {
        return self::getAll();
    }
}
