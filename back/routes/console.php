<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(UserController::class, ['storeTenantUsers'])->daily();
