<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function store(Request $request)
    {
        Storage::create([
            'partner_id' => auth()->user()->id,
            'name'       => $request->name,
            'latitude'   => $request->latitude,
            'longitude'  => $request->longitude,
            'size'       => $request->size,
            'price'      => $request->price,
            'qty'        => $request->qty,
        ]);

        session()->flash('alert-success', 'Storage created successfully');

        return redirect()->to(route('partner.dashboard'));
    }
}
