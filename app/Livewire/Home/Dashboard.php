<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.home.dashboard');
    }
    
    public function mount()
    {
        return redirect()->route('admin.dashboard');
    }
    
    public function test(){
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success',
            'message' => 'This is a success message.'
        ]);
    }
}
