<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\BoardingPlace;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsers extends Controller
{
    public function manageAdmins()
    {
        $users = User::where('userType', 'ADM')->get();

        return view('super-admin.admins', compact('users'));
    }

    public function manageBOwners()
    {
        $users = User::where('userType', 'BOR')->get();

        return view('super-admin.bowners', compact('users'));
    }


    public function manageBoarders()
    {
        $users = User::where('userType', 'CLNT')->get();

        return view('super-admin.borders', compact('users'));
    }

    public function removeUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with(['message' => 'User removed successfully']);
    }
}
