<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {

    Route::resource('loans', LoanController::class);

    Route::resource('computers', ComputerController::class);

    Route::post('loans/check', [LoanController::class, 'checkValidateValue'])->name('loans.check');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('msgraph', [UserController::class, 'storeTenantUsers'])->name('msgraph');

    Route::fallback(static function () {
        return redirect(route('loans.create'));
    });
});
