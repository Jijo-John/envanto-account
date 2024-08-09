<?php

namespace App\Livewire\User;

use Razorpay\Api\Api;
use App\Models\Package;
use App\Models\Setting;
use Livewire\Component;

class PaymentOptions extends Component
{
    protected $listeners = ['paymentConfirm' => 'RazorpayPaymentConfirm'];
    public $razorpay_key, $razorpay_secret, $logo, $payment_enabled, $contact_url, $package_id;
    public function render()
    {
        return view('livewire.user.payment-options');
    }
    
    
    public function RazorpayPaymentConfirm($payment_id)
    {
        $api = new Api($this->razorpay_key, $this->razorpay_secret);
        $payment = $api->payment->fetch($payment_id);
        if(!empty($payment_id)){

            try{
                $res = $payment->capture(array('amount'=>$payment->amount));
                if($res['status'] == 'captured'){
                    auth()->user()->purchases()->updateOrCreate(
                        [
                           'user_id' => auth()->id(),
                        ],
                        [
                        'subscription_start' => now(),
                        'subscription_end' => now()->addDays(30),
                        'package_id' => $this->package_id,
                        'payment_id' => $payment_id,
                        'payment_status' => 'success',
                        'status' => 'active',
                    ]);
                    
                    $this->dispatchBrowserEvent('swal:modal', [
                        'type' => 'success',
                        'message' => 'Subscription Renewed Successfully',
                    ]);
                    
                }

            }catch(\Exception $e){
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'error',
                    'message' => 'Payment Failed if your money is deducted, it will be refunded within 7 working days',
                ]);
                return ;
            }

        }

    }
    
    public function mount($package_id)
    {
        $settings = Setting::get();
        $this->razorpay_key = $settings->where('key','razorpay_key')?->value('value');
        $this->razorpay_secret = $settings->where('key','razorpay_secret')?->value('value');
        $this->logo = $settings->where('key','logo')?->value('value');
        $this->payment_enabled = $settings->where('key','payment_enabled')?->value('value');
        $this->contact_url = $settings->where('key','contact_url')?->value('value');
        $this->package_id = $package_id;
        if($this->payment_enabled == 0){
            return redirect()->to($this->contact_url);
        }
        if(!$this->package_id){
            abort(404);
        }
    }
    
    public function renew()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        
        $package = Package::find($this->package_id);
        $price = $package->price;
        if($this->payment_enabled == 0){
            return redirect()->to($this->contact_url);
        }
        $this->emit('loading');
        $this->emit('RazorpayPayment', $price, $this->razorpay_key);
    }
    
    
}
