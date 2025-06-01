<?php

use App\Models\Destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Auth\CustomVerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\CustomVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::get('/redirects_after_login', \App\Http\Controllers\RedirectAfterLoginController::class)->name('redirect.after.login');

//-----------------ADMIN ROUTES-------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin_dashboard');
    })->name('admin.dashboard');
    //manage destinations
    Route::get('/admin/manage_destinations', function () {
        $destinations = Destination::all();
        return view('admin.admin_manage_destinations', compact('destinations'));
    })->name('admin.manage_destinations');
    //create a destination
    Route::post('/create_destination', [DestinationController::class, 'store']);
    //get destination details by id
    Route::get('/get_destination/{id}', [DestinationController::class, 'getDestination']);
    //update destination details by id
    Route::match(['POST', 'PUT'], '/update_destination/{id}', [DestinationController::class, 'update']);
    //delete destination by id
    Route::delete('/delete_destination/{id}', [DestinationController::class, 'destroy']);
});

//-----------------END ADMIN ROUTES---------------


//-----------------SUB ADMIN ROUTES-------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/sub_admin/dashboard', function () {
        return view('sub_admin.sub_admin_dashboard');
    })->name('sub_admin.dashboard');
});
//-----------------END SUB ADMIN ROUTES---------------


//-----------------USER ROUTES-------------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.user_dashboard');
    })->name('user.dashboard');
});
//-----------------END USER ROUTES---------------
