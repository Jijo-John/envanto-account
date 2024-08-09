<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\ImageService;

class Profile extends Component
{
    use WithFileUploads;
    
    public $title, $logo, $contact_url, $payment_enabled = false, $razorpay_key, $razorpay_secret, $interval;
    public function render()
    {
        return view('livewire.profile');
    }
    
    public function mount()
    {
        $settings = \App\Models\Setting::get();
        foreach($settings as $setting){
            $this->{$setting->key} = $setting->value;
        }
    }
    
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'contact_url' => 'required',
        ]);
        
        $imageService = new ImageService();
        if($this->logo){
            $imageService->upload($this->logo, 'logo');
            $this->logo = $imageService->getFileUrl();
        }
        
        $this->updateOrCreateSetting('title', $this->title);
        $this->updateOrCreateSetting('contact_url', $this->contact_url);
        $this->updateOrCreateSetting('payment_enabled', $this->payment_enabled);
        $this->updateOrCreateSetting('razorpay_key', $this->razorpay_key);
        $this->updateOrCreateSetting('logo', $this->logo);
        $this->updateOrCreateSetting('razorpay_secret', $this->razorpay_secret);
        $this->updateOrCreateSetting('interval', $this->interval);
        
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success',
            'message' => 'Settings save successfully',
        ]);
    }
    
    public function updateOrCreateSetting($key, $value)
    {
        $setting = \App\Models\Setting::where('key', $key)->first();
        if($setting){
            $setting->update([
                'value' => $value,
            ]);
        }else{
            \App\Models\Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
