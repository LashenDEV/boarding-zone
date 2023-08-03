<?php

namespace App\Http\Livewire\Client;

use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyBoardingPlace extends Component
{
    public function render()
    {
        $reserved_boarding_place = ReservedBoardingPlaces::where('boarder_id', Auth::user()->id)->first();
        $my_boarding_place = BoardingPlace::where('id', $reserved_boarding_place->id)->first();
        $boarders = ReservedBoardingPlaces::where('boarding_place_id', $reserved_boarding_place->id)->with('boarders')->get();

        return view('livewire.client.my-boarding-place', compact('my_boarding_place', 'reserved_boarding_place', 'boarders'))->extends('layouts.client');
    }
}
