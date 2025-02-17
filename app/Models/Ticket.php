<?php
namespace App\Models;

use App\Core\DbModel;

class Ticket extends DbModel
{
    public int $userId;
    public int $eventId;

    public function getTableName(): string
    {
        return 'tickets';
    }

    public function getAttributes(): array
    {
        return ['userId', 'eventId'];
    }

    public function getPrimaryKey(): string
    {
        return 'id';
    }

    public static function getAllTickets() : array
    {
        $sql = "SELECT tickets.id, events.title, events.picture, events.eventdate, events.location FROM events 
        JOIN tickets ON tickets.eventId = events.id;";
        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getById(int $id) : array
    {
        $sql = "SELECT tickets.id, events.title, events.picture, events.eventdate, cities.name, events.location, users.firstname || ' ' || users.lastname AS fullName, users.email, events.price FROM events 
        JOIN tickets ON tickets.eventId = events.id
        JOIN users ON users.id = tickets.userId
        JOIN cities ON cities.id = events.cityId
        WHERE tickets.id = ?";
        $stmt = self::prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function rules(): array
    {
        return [];
    }
}
