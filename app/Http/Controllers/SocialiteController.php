<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    public function redirectGoogle()
    {
        return socialite::driver('google')->redirect();
    }





    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('social_id',$user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
            return redirect()->route('home');
        }else{
            // dd($user);
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('my-google') ,
                'social_id' => $user->id,
                'social_type' => 'google',
            ]);
            Auth::login($user);
            return redirect()->route('home');
        }



        return redirect('/home');
    }

}
