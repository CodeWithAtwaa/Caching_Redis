<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $google = Socialite::driver('google')->user();
            $user = User::updateOrCreate([
                'email' => $google->getEmail(),
            ], [
                'name' => $google->getName(),
                'provider_id' => $google->getId(),
                'password' => Hash::make(Str::random(24)),
            ]);
            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to authenticate with Google.');
        }
    }
}
