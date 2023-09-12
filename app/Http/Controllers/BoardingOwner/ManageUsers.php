<?php

namespace App\Http\Controllers\BoardingOwner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsers extends Controller
{
    public function manageBoarders()
    {
        $users = User::where('userType', 'CLNT')->get();

        return view('boarding-owner.borders', compact('users'));
    }

    public function removeUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with(['message' => 'User removed successfully']);
    }
}
