<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        // $socialUser = Socialite::driver($provider)->user();
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => bcrypt(Str::random(16)), // mesmo que não use senha
            ]);
        }

        // Atualiza provider_id se estiver faltando
        if (!$user->provider_id) {
            $user->provider = $provider;
            $user->provider_id = $socialUser->getId();
            $user->save();
        }

        Auth::login($user, true);

        return redirect()->intended('/dashboard');
    }


}
