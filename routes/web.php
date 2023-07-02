<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'checkUserType']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Routes for Super Admin
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth', 'is_s_admin']], function () {
    Route::get('/dashboard', function () {
        return view('super-admin.dashboard');
    })->name('super-admin.dashboard');

    Route::get('/boarding-places', [App\Http\Controllers\SuperAdmin\ManageBoardingPlace::class, 'index'])->name('super-admin.boarding-house.index');
});

//Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/boarding-places', [App\Http\Controllers\Admin\ManageBoardingPlace::class, 'index'])->name('admin.boarding-house.index');
});

//Routes for Boarding Owner
Route::group(['prefix' => 'boarding-owner', 'middleware' => ['auth', 'is_b_owner']], function () {
    Route::get('/dashboard', function () {
        return view('boarding-owner.dashboard');
    })->name('boarding-owner.dashboard');

    Route::get('/boarding-places', [App\Http\Controllers\BoardingOwner\ManageBoardingPlace::class, 'index'])->name('boarding-owner.boarding-house.index');
});

//Routes for IsClient
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'is_client']], function () {
    Route::get('/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
});
