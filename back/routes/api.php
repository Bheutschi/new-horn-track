<?php

use App\Http\Controllers\Api\ComputerController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{user}', [UserController::class, 'show']);

Route::get('/computers', [ComputerController::class, 'index']);
Route::get('/computer/{id}', [ComputerController::class, 'show']);
