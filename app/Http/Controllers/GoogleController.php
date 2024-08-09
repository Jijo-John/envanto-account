<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->route('dashboard');
            }else{
                $newUser = User::updateOrCreate([
                    'email' => $user->email],
                    ['name' => $user->name,
                    'google_id'=> $user->id,
                    'password' => Hash::make('123456@123'),
                    'phone' => $user->phone ?? '',
                ]);
                Auth::login($newUser);
                return redirect()->route('dashboard');
            }
     
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('login');
        }
    }
}
