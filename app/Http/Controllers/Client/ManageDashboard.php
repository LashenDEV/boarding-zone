<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDashboard extends Controller
{
    public function index()
    {
        $reserved_boarding_place = ReservedBoardingPlaces::where('boarder_id', Auth::user()->id)->first();
        $my_boarding_place = BoardingPlace::where('id', $reserved_boarding_place->boarding_place_id)->first();
        $same_reserved_boarding = ReservedBoardingPlaces::where('id', $my_boarding_place->id)->get();
        return view('client.dashboard', compact('my_boarding_place', 'same_reserved_boarding'));
    }
}
