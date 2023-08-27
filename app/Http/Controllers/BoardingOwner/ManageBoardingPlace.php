<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use Illuminate\Http\Request;

class ManageBoardingPlace extends Controller
{
    public function index()
    {
        return view('boarding-owner.boarding-place');
    }

    public function manageMap()
    {
        $locations = BoardingPlace::select('name', 'latitude', 'longitude')->get()->toArray();
        return view('boarding-owner.map', compact('locations'));
    }

    public function manageMapForClient()
    {
        $locations = BoardingPlace::select('name', 'latitude', 'longitude')->get()->toArray();
        return view('client.map', compact('locations'));
    }
}
