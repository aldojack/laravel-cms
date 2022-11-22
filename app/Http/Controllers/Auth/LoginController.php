<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        //Create a new user in our database
        $githubUser = Socialite::driver('github')->user();
        
        $user = User::create([
            'name' => $githubUser->getName(),
            'username' => $githubUser->getNickname(),
            'email' => $githubUser->getEmail(),
            'provider_id' => $githubUser->getId(),
        ]);

        //Log the user in
        auth()->login($user, true);
        //Redirect to dashboard
        return redirect('/');
    }
}