<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Account extends Component
{
    public $password, $password_confirmation;
    public function render()
    {
        return view('livewire.user.account');
    }
    
    public function update()
    {
        $this->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($this->password),
        ]);
        
        $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Password Updated', 'type' => 'success']);
    }
}
