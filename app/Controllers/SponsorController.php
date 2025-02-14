<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    /**
     * Returns all sponsors as JSON.
     */
    public function getAllSponsors(Request $request, Response $response): void
    {
        $sponsors = Sponsor::allSponsors();
        header('Content-Type: application/json');
        echo json_encode($sponsors);
    }


    public function createSponsor(Request $request, Response $response): void
    {
        $data = $request->getBody();

        $sponsor = new Sponsor();
        $sponsor->loadData($data);

        if ($sponsor->validate() && $sponsor->save()) {
            header('Content-Type: application/json');
            echo json_encode($sponsor);
        }
    }
}
