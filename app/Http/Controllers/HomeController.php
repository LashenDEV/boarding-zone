<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkUserType()
    {
        if (!Auth::user()) {
            return view('welcome');
        }
        if (Auth::user()->userType === 'SADM') {
            return redirect()->route('super-admin.dashboard');
        }
        if (Auth::user()->userType === 'ADM') {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user()->userType === 'BOR') {
            return redirect()->route('boarding-owner.dashboard');
        }
        if (Auth::user()->userType === 'CLNT') {
            return redirect()->route('client.dashboard');
        }
    }
}
