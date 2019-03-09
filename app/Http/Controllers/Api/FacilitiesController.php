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
        foreach (range(0,5) as $i)
        {
            $locations[] = $this->generateLocation();
        }

        return $locations;
    }

    private function generateLocation()
    {
        $faker = Faker\Factory::create();
        $name = $faker->streetAddress;
        $size   = $faker->numberBetween(20, 40) . "kg";
        $price = $faker->numberBetween(50, 100) . "/hour";
        $latitude = $faker->latitude(77.53, 77.62);
        $longitude = $faker->longitude(12.94, 12.99);
        return [
            'type'       => 'Feature',
            'geometry'   => [
                'type'        => 'Point',
                'coordinates' => [
                    $latitude,
                    $longitude,
                ],
            ],
            'properties' => [
                'name' => $name,
                'size' => $size,
                'price' => $price,
                'button' => '<a href="'. route('booking.create', ['name'=>$name, 'size' => $size, 'price' => $price, 'lat'=>$latitude, 'lng' => $longitude ]) .'" class="btn btn-primary">Book Now</a>',
                'qty'   => $faker->numberBetween(2,10),
            ],
        ];
    }


}
