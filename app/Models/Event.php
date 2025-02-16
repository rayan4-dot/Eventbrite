<?php

namespace App\Models;

use App\Core\Application;
use App\Core\DbModel;

abstract class Event extends DbModel
{
    public string $title = '';
    public string $picture = '';
    public int $categoryId;
    public string $description = '';
    public string $eventdate = '';
    public string $type = '';
    public string $price = '';
    public int $capacity = 0;
    public int $organiserId;
    public ?string $organisername = '';
    public ?string $categoryname = '';


    public function getTableName() : string
    {
        return 'events';
    }

    public function getPrimaryKey() : string
    {
        // TODO: Implement getPrimaryKey() method.
        return 'id';
    }

    public static function getAllEvents() : array
    {
        $db = Application::$app->db->conn;
        $sql = "SELECT * FROM events";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll(\PDO::FETCH_CLASS);
        return $events;
    }

    public static function findById(int $id) : ?object
    {
        $sql = "SELECT events.*,
                   categories.name AS categoryName,
                   users.firstName || users.lastName AS organiserName
            FROM events
            LEFT JOIN categories ON events.categoryId = categories.id
            LEFT JOIN users ON events.organiserId = users.id
            WHERE events.id = ?";
        $stmt = self::prepare($sql);

        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!$data) {
            return null;
        }
//        dump($data); die;
        $event = null;
        if($data['type'] === 'f2f') {
            $event = new F2FEvent();
        } else if($data['type'] === 'online') {
            $event = new OnlineEvent();
        }

        if($event) {
            $event->loadData($data);
            return $event;
        }

        return null;
    }

    public function rules() : array
    {
        return [
            'title' => [$this->validator::RULE_REQUIRED],
            'picture' => [$this->validator::RULE_REQUIRED],
            'description' => [$this->validator::RULE_REQUIRED],
            'type' => [$this->validator::RULE_REQUIRED],
            'eventDate' => [$this->validator::RULE_REQUIRED, [$this->validator::RULE_DATE, 'minDate' => (new \DateTime())->modify('+7 days')->format('Y-m-d')]],
            'categoryId' => [$this->validator::RULE_REQUIRED],
            'capacity' => [$this->validator::RULE_REQUIRED]
        ];
    }


}