<?php

namespace App\Controllers;

use App\Models\City;

class CityController
{
    public function getRegionCities()
    {
        if(isset($_GET['regionId'])) {
            $regionId = (int)$_GET['regionId'];

            $city = new City();
            $cities = $city::find(['regionId' => $regionId]);

            header('Content-Type: application/json');
            echo json_encode($cities);
        }
    }
}