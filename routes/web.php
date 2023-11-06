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

Route::get('/home', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/', [HomeController::class, 'checkUserType'])->name('home');
//Route::get('/view-boarding-place/{id}', \App\Http\Livewire\ViewBoardingPlaces::class)->name('view-boarding-place');
Route::get('/view-boarding-place/{id}', [\App\Http\Controllers\ViewBoardingPlace::class, 'viewBoardingPlace'])->name('view-boarding-place');

//Pages
Route::get('/contact-us', [\App\Http\Controllers\PageController::class, 'contactUs'])->name('contact-us');
Route::get('/about-us', [\App\Http\Controllers\PageController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [\App\Http\Controllers\PageController::class, 'services'])->name('services');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'changeDashboard'])->name('dashboard');
});

//Routes for Super Admin
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth', 'is_s_admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\SuperAdmin\ManageDashboard::class, 'index'])->name('super-admin.dashboard');

    //User Management
    Route::get('/admins', [App\Http\Controllers\SuperAdmin\ManageUsers::class, 'manageAdmins'])->name('super-admin.admins');
    Route::get('/bowners', [App\Http\Controllers\SuperAdmin\ManageUsers::class, 'manageBOwners'])->name('super-admin.bowners');
    Route::get('/borders', [App\Http\Controllers\SuperAdmin\ManageUsers::class, 'manageBoarders'])->name('super-admin.borders');
    Route::delete('/user/remove/{id}', [App\Http\Controllers\SuperAdmin\ManageUsers::class, 'removeUser'])->name('super-admin.user.remove');

    //Boarding Reviews
    Route::get('boarding-places/reviews/', [App\Http\Controllers\SuperAdmin\ManageBoardingReviews::class, 'index'])->name('super-admin.boarding-house.reviews');
    Route::get('boarding-places/review/approve/{id}', [App\Http\Controllers\SuperAdmin\ManageBoardingReviews::class, 'approval'])->name('super-admin.boarding-house.review.approve');
    Route::get('boarding-places/reviews/reject/{id}', [App\Http\Controllers\SuperAdmin\ManageBoardingReviews::class, 'rejection'])->name('super-admin.boarding-house.review.reject');
    Route::get('boarding-places/reviews/remove/{id}', [App\Http\Controllers\SuperAdmin\ManageBoardingReviews::class, 'removal'])->name('super-admin.boarding-house.review.remove');

    Route::get('/boarding-places', [App\Http\Controllers\SuperAdmin\ManageBoardingPlace::class, 'index'])->name('super-admin.boarding-house.index');
});

//Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\ManageDashboard::class, 'index'])->name('admin.dashboard');

    //User Management
    Route::get('/bowners', [App\Http\Controllers\Admin\ManageUsers::class, 'manageBOwners'])->name('admin.bowners');
    Route::get('/borders', [App\Http\Controllers\Admin\ManageUsers::class, 'manageBoarders'])->name('admin.borders');
    Route::delete('/user/remove/{id}', [App\Http\Controllers\Admin\ManageUsers::class, 'removeUser'])->name('admin.user.remove');

    Route::get('/boarding-places', [App\Http\Controllers\Admin\ManageBoardingPlace::class, 'index'])->name('admin.boarding-house.index');

    //Boarding Reviews
    Route::get('boarding-places/reviews/', [App\Http\Controllers\Admin\ManageBoardingReviews::class, 'index'])->name('admin.boarding-house.reviews');
    Route::get('boarding-places/review/approve/{id}', [App\Http\Controllers\Admin\ManageBoardingReviews::class, 'approval'])->name('admin.boarding-house.review.approve');
    Route::get('boarding-places/reviews/reject/{id}', [App\Http\Controllers\Admin\ManageBoardingReviews::class, 'rejection'])->name('admin.boarding-house.review.reject');
    Route::get('boarding-places/reviews/remove/{id}', [App\Http\Controllers\Admin\ManageBoardingReviews::class, 'removal'])->name('admin.boarding-house.review.remove');
});

//Routes for Boarding Owner
Route::group(['prefix' => 'boarding-owner', 'middleware' => ['auth', 'is_b_owner']], function () {
    Route::get('/dashboard', [App\Http\Controllers\BoardingOwner\ManageDashboard::class, 'index'])->name('boarding-owner.dashboard');
    Route::get('/boarding-places', [App\Http\Controllers\BoardingOwner\ManageBoardingPlace::class, 'index'])->name('boarding-owner.boarding-house.index');

    Route::get('/map', [App\Http\Controllers\BoardingOwner\ManageBoardingPlace::class, 'manageMap'])->name('boarding-owner.map');

    //Boarding Reviews
    Route::get('boarding-places/reviews/{id}', [App\Http\Controllers\BoardingOwner\ManageBoardingReviews::class, 'index'])->name('boarding-owner.boarding-house.reviews');
    Route::get('boarding-places/review/approve/{id}', [App\Http\Controllers\BoardingOwner\ManageBoardingReviews::class, 'approval'])->name('boarding-owner.boarding-house.review.approve');
    Route::get('boarding-places/reviews/reject/{id}', [App\Http\Controllers\BoardingOwner\ManageBoardingReviews::class, 'rejection'])->name('boarding-owner.boarding-house.review.reject');
    Route::get('boarding-places/reviews/remove/{id}', [App\Http\Controllers\BoardingOwner\ManageBoardingReviews::class, 'removal'])->name('boarding-owner.boarding-house.review.remove');


    //User Management
    Route::get('/borders', [App\Http\Controllers\BoardingOwner\ManageUsers::class, 'manageBoarders'])->name('bowner.borders');
    Route::delete('/user/remove/{id}', [App\Http\Controllers\BoardingOwner\ManageUsers::class, 'removeUser'])->name('bowner.user.remove');


    //User Management
    Route::get('/borders', [App\Http\Controllers\BoardingOwner\ManageUsers::class, 'manageBoarders'])->name('bowner.borders');
    Route::delete('/user/remove/{id}', [App\Http\Controllers\BoardingOwner\ManageUsers::class, 'removeUser'])->name('bowner.user.remove');

    //Payments
    Route::get('/payments', [App\Http\Controllers\BoardingOwner\ManagePayments::class, 'payments'])->name('boarding-owner.payments');
    Route::get('/payments/approval/{id}', [App\Http\Controllers\BoardingOwner\ManagePayments::class, 'paymentApproval'])->name('boarding-owner.payment.approval');
    Route::get('/payments/rejection/{id}', [App\Http\Controllers\BoardingOwner\ManagePayments::class, 'paymentRejection'])->name('boarding-owner.payment.reject');
});

//Routes for IsClient
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'is_client']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Client\ManageDashboard::class, 'index'])->name('client.dashboard');
    Route::get('/my-boarding-place', \App\Http\Livewire\Client\MyBoardingPlace::class)->name('my-boarding-place');
    Route::get('/reserve-boarding-place/{id}', [\App\Http\Controllers\ViewBoardingPlace::class, 'reserveBoardingPlace'])->name('reserve-a-boarding-place');

    Route::get('/map', [App\Http\Controllers\BoardingOwner\ManageBoardingPlace::class, 'manageMapForClient'])->name('client.map');

    //Payments
    Route::get('/payments', [App\Http\Controllers\Client\ManagePayments::class, 'payments'])->name('client.payments');
    Route::post('/payments/store', [App\Http\Controllers\Client\ManagePayments::class, 'storePayment'])->name('client.payment.store');
});
