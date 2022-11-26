<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        //Create a new user in our database
        $socialUser = Socialite::driver($provider)->user();
        $newUsername = $socialUser->getNickname() ? $socialUser->getNickname() : $socialUser->getNickname().substr($socialUser->getId(), 0, 5);

        $user = User::firstOrCreate(
            [
                'provider_id' => $socialUser->getId(),
            ],
            [
                'name' => $socialUser->getName(),
                'username' => $newUsername,
                'email' => $socialUser->getEmail(),
                'provider_id' => $socialUser->getId(),
                'verified' => 1,
            ]
        );

        //Log the user in
        auth()->login($user, true);
        //Redirect to dashboard
        return redirect('/');
    }
}