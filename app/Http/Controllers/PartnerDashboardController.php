<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;

class PartnerDashboardController extends Controller
{
    public function index()
    {
        return view('partner.dashboard')->with([
            'storages' => auth()->user()->storages,
        ]);
    }
}
