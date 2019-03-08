<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        // Mapper::location('Sheffield');
        // Mapper::location('Sheffield')->map(['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);
        // Mapper::location('Sheffield')->streetview(1, 1, ['ui' => false]);

        // Mapper::marker(53.381128999999990000, -1.470085000000040000);
        // Mapper::marker(53.381128999999990000, -1.470085000000040000, ['symbol' => 'circle', 'scale' => 1000]);
        // Mapper::map(52.381128999999990000, 0.470085000000040000)->marker(53.381128999999990000, -1.470085000000040000, ['markers' => ['symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']]);

        return view('customer.dashboard');
    }
}
