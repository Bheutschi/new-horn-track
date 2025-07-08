<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function storeTenantUsers(MicrosoftGraphController $graphController): void
    {
        foreach ($graphController->returnAllTenantUsers() as $user) {
            User::updateOrCreate($user);
        }
    }
}
