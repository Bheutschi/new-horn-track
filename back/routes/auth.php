<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/redirect', [AuthController::class, 'redirect'])->name('redirect');

Route::get('/callback', [AuthController::class, 'callback'])->name('callback');
