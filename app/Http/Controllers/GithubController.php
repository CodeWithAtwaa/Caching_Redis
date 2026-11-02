<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $socialiteUser = Socialite::driver('github')->user();

            $user = User::updateOrCreate(
                [
                    'email' => $socialiteUser->getEmail(),
                ],
                [
                    'name' => $socialiteUser->getName() ?? $socialiteUser->getNickname(),
                    'provider_id' => $socialiteUser->getId(),
                    'password' => Hash::make(Str::random(24)),
                ]
            );

            Auth::login($user, true);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to authenticate with GitHub.');
        }
    }
}
