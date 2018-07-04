<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegistrationMail;
use App\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialAuth extends Controller
{
    const GITHUB = 'github';
    const FACEBOOK = 'facebook';

    /**
     * @param string $provider
     * @return mixed
     */
    public function redirectToProvider($provider)
    {
        switch ($provider)
        {
            case SocialAuth::FACEBOOK:
                return Socialite::driver(SocialAuth::FACEBOOK)->redirect();
            case SocialAuth::GITHUB:
                return Socialite::driver(SocialAuth::GITHUB)->redirect();
        }
    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        switch ($provider)
        {
            case SocialAuth::FACEBOOK:
                $data = Socialite::driver('facebook')->user();
                break;
            case SocialAuth::GITHUB:
                $data = Socialite::driver('github')->user();
                break;
        }

        return $this->auth($data);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function auth($data)
    {
        $user = User::where('email', $data->getEmail())->first();

        if(! is_null($user))
        {
            Auth::login($user);
            return redirect('/home');
        }
        else
        {
            if($this->registerNewUser($data))
            {
                return redirect('/home');
            }
            return redirect('/register');
        }
    }

    /**
     * @param $data
     * @return bool
     */
    private function registerNewUser($data)
    {
        $user = new User();
        $user->name = $data->getNickname();
        $user->email = $data->getEmail();
        if($user->save())
        {
            $this->sendHelloMail($user);
            Auth::login($user);
            return true;
        }
        return false;
    }

    /**
     * @param User $user
     */
    private function sendHelloMail($user)
    {
        Mail::to($user)->send(new RegistrationMail());
    }
}