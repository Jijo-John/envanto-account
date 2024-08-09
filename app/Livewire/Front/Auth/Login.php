<?php

namespace App\Livewire\Front\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.front.auth.login');
    }
        
    /**
     * index
     *
     * @return 
     */
    public function index() 
    {
        return view('front.auth.login');
    }
    
    /**
     * login
     *
     * @return 
     */
    
    public function login()
    {
          $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            
            if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
                $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Login Successful', 'type' => 'success']);
                if (auth()->user()->type == 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            
            $this->dispatchBrowserEvent('show-snackbar', ['message' => 'Invalid Credentials', 'type' => 'error']);
            
    }
}
