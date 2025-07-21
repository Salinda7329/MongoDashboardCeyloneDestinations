<?php

use App\Models\User;
use App\Models\Gallery;
use App\Models\Destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Auth\CustomVerificationController;

Route::get('/', function () {
    // return view('welcome');
    return view('new-welcome');
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
    //manage users
    Route::get('/admin/manage_users', function () {
        $users = User::all();
        return view('admin.admin_manage_users', compact('users'));
    })->name('admin.manage_users');
    // Create a new user
    Route::post('/create_user', [UsersController::class, 'store']);
    // Get user details by ID
    Route::get('/get_user/{id}', [UsersController::class, 'getUser']);
    // Update user by ID
    Route::match(['POST', 'PUT'], '/users/{id}', [UsersController::class, 'update']);
    // Delete user by ID
    Route::delete('/users/{id}', [UsersController::class, 'destroy']);

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

    //manage galleries
    Route::get('/admin/manage_galleries', function () {
        $galleries = Gallery::all();
        return view('admin.admin_manage_galleries', compact('galleries'));
    })->name('admin.manage_galleries');
    // Get gallery details by ID
    Route::get('/galleries/{id}', [GalleriesController::class, 'getGallery']);
    // Create a new gallery
    Route::post('/galleries', [GalleriesController::class, 'store']);
    // Update gallery details by ID (method spoofed with POST + _method=PUT)
    Route::match(['POST', 'PUT'], '/galleries/{id}', [GalleriesController::class, 'update']);
    // Delete gallery by ID
    Route::delete('/galleries/{id}', [GalleriesController::class, 'destroy']);
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
