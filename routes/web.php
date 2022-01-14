<?php

use App\Http\Controllers\User\PrintingsController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.home.home');
});

// User Routes
Route::post('/store-user', [UsersController::class, "store"]);
Route::get('/find-user', [UsersController::class, "findUser"]);
Route::get('/get-all-user', [UsersController::class, "getAllUser"]);
Route::post('/update-user', [UsersController::class, "update"]);

// Printing Routes
Route::post('/store-printings', [PrintingsController::class, "store"]);
Route::get('/find-printing', [PrintingsController::class, "find"]);
Route::get('/get-all-printings', [PrintingsController::class, "all"]);
Route::post('/update-printings', [PrintingsController::class, "update"]);
