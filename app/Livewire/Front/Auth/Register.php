<?php

namespace App\Livewire\Front\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $country_code = '+91', $name, $email, $password, $password_confirmation, $phone, $state, $city, $country = 'India';
    public function render()
    {
        $codes = [
            '+91', '+1', '+44', '+61', '+971', '+966', '+65', '+60', '+63', '+62', '+81', '+86', '+82', '+66', '+84', '+82', '+49', '+33', '+39', '+34', '+351', '+41','+966'
        ];
        return view('livewire.front.auth.register', compact('codes'));
    }
    
    public function index()
    {
        return view('front.auth.register');
    }
    
    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
        
       $user =  User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'state' => $this->state,
            'city' => $this->city,
            'country' => $this->country,
        ]);
        
        auth()->login($user);
        $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Registration Successful', 'type' => 'success']);
        return redirect()->route('home');
    }
}
