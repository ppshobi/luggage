<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Faker;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
{
    public function index()
    {
        return response()->json( [
            'type'     => 'FeatureCollection',
            'features' => $this->generateLocations(),
        ]);
    }

    private function generateLocations()
    {
        $locations = [];
        foreach (range(0,100) as $i)
        {
            $locations[] = $this->generateLocation();
        }

        return $locations;
    }

    private function generateLocation()
    {
        $faker = Faker\Factory::create();
        return [
            'type'       => 'Feature',
            'geometry'   => [
                'type'        => 'Point',
                'coordinates' => [
                    $faker->latitude(12, 77),
                    $faker->longitude(12, 77),
                ],
            ],
            'properties' => [
                'name' => $faker->streetAddress,
                'size' => $faker->numberBetween(20, 40) . "kg",
                'price' => $faker->numberBetween(50, 100) . "/hour",
                'qty'   => $faker->numberBetween(2,10),
            ],
        ];
    }


}
