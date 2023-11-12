<?php

namespace App\Http\Controllers;

use App\Models\BoardingPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function welcome()
    {
        return view('home');
    }

    public function checkUserType()
    {
        if (!Auth::user()) {
            $boarding_places = BoardingPlace::where('publish_status', 'Approved')->get();
            return view('home', compact('boarding_places'));
        } elseif (Auth::user()) {
            return redirect('dashboard');
        }
    }

    public function changeDashboard()
    {
        if (Auth::user()->userType === 'SADM') {
            return redirect()->route('super-admin.dashboard');
        } elseif (Auth::user()->userType === 'ADM') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->userType === 'BOR') {
            return redirect()->route('boarding-owner.dashboard');
        } elseif (Auth::user()->userType === 'CLNT') {
            return redirect()->route('client.dashboard');
        }else{
            return redirect()->route('welcome');
        };
    }
}
