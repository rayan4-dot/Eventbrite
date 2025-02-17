<?php

namespace App\Models;

use App\Core\DbModel;
use Cassandra\Date;

class Booking extends DbModel
{
    public int $userId;
    public int $eventId;
    public float $price;
    public int $quantity = 0;
    public float $totalPrice = 0;

    public function getTableName() : string
    {
        // TODO: Implement getTableName() method.
        return 'bookings';
    }

    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['userId', 'eventId', 'quantity', 'totalPrice'];
    }

    public function getPrimaryKey() : string
    {
        // TODO: Implement getPrimaryKey() method.
        return 'id';
    }


    public function rules() : array
    {
        return [];
    }
}