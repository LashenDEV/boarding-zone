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
Route::get('/super-admin/dashboard', function () {
    return view('super-admin.dashboard');
})->name('super-admin.dashboard');

//Routes for Admin
Route::get('/admin/dashboard', function () {
    return view('admin.admin-dashboard');
})->name('admin.dashboard');

//Routes for Boarding Owner
Route::get('/boarding-owner/dashboard', function () {
    return view('boarding-owner.dashboard');
})->name('boarding-owner.dashboard');

//Routes for Client
Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->name('client.dashboard');
