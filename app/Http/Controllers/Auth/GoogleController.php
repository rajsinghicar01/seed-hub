<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(uniqid()), // Dummy password
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );

            // Assign default role (optional)
            if (!$user->hasRole('User')) {
                $user->assignRole('User');
            }

            // Log activity manually (optional)
            activity()
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties(['email' => $googleUser->getEmail()])
            ->log('User logged in with Google');

            Auth::login($user);
            return redirect()->route('dashboard'); // Change this route as needed
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Google login failed');
        }
    }
}

