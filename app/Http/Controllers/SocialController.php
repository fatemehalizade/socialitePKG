<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver("github")->redirect();
    }
    public function redirectGG()
    {
        return Socialite::driver("google")->redirect();
    }
    public function redirectYH()
    {
        return Socialite::driver('yahoo')->redirect();
    }

    // public function Callback($provider)
    // {
    //     $userSocial =   Socialite::driver($provider)->user();
    // }

    public function Callback(){
        $userSocial = Socialite::driver("github")->user();
        $users = User::where(['email' => $userSocial->getEmail(),"provider" => "github"])->first();
        if($users){
            Auth::login($users);
            return redirect('/');
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => "github",
            ]);
            return redirect()->route('home');
        }
    }

    public function CallbackGG(){
        $userSocial = Socialite::driver("google")->user();
        $users = User::where(['email' => $userSocial->getEmail(),"provider" => "google"])->first();
        if($users){
            Auth::login($users);
            return redirect('/');
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => "google",
            ]);
            return redirect()->route('home');
        }
    }

    public function CallbackYH(){
        $userSocial = Socialite::driver("yahoo")->user();
        $users = User::where(['email' => $userSocial->getEmail(),"provider" => "yahoo"])->first();
        if($users){
            Auth::login($users);
            return redirect('/');
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => "yahoo",
            ]);
            return redirect()->route('home');
        }
    }
}
