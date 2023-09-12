<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsers extends Controller
{
    public function manageBOwners()
    {
        $users = User::where('userType', 'BOR')->get();

        return view('admin.bowners', compact('users'));
    }


    public function manageBoarders()
    {
        $users = User::where('userType', 'CLNT')->get();

        return view('admin.borders', compact('users'));
    }

    public function removeUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with(['message' => 'User removed successfully']);
    }
}
