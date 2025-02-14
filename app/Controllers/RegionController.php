<?php

namespace App\Controllers;

use App\Models\Region;

class RegionController
{
    public function getAllRegions() : void
    {
        $region = new Region();
        $regions = $region::getAll();
        header('Content-Type: application/json');
        echo json_encode($regions);
    }
}