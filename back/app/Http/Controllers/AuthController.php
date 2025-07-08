<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->flush();

        $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));

        return redirect($azureLogoutUrl);
    }

    public function redirect()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('azure')->user();

        $user = User::updateOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
        ]);

        Auth::login($user);

        return redirect(route('loans.index'));
    }
}
