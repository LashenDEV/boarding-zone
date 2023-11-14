<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\ReservedBoardingPlaces;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsers extends Controller
{
    public function manageBoarders()
    {
        $clnts[] = null;

        $clnts = ReservedBoardingPlaces::with('boarders')->get();

        return view('boarding-owner.borders', compact('clnts'));
    }

    public function removeUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with(['message' => 'User removed successfully']);
    }
}
