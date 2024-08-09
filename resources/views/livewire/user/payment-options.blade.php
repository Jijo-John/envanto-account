<div>
    <button id="loading" wire:click="renew" class="bg-[#7726b5] text-white p-2 rounded-md w-full">
       <span wire:loading wire:target="renew">
        <i class="fa fa-spinner fa-spin"></i>
       </span>
        Renew Subscription
    </button>
    
    @push('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        
        Livewire.on('loading', function() {
            $('#loading').attr('disabled', true);
            $('#loading').html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> &nbsp; Processing...');
        });
        
        Livewire.on('RazorpayPayment', (amount, razorpay_key) => {
            var options = {
                "key": razorpay_key,
                "amount": 100 * amount,
                "currency": "INR",
                "name": "{{ config('app.name') }}",
                "description": "Payment",
                "image": @this.logo,
                "handler": function(response) {
                    window.livewire.emit('paymentConfirm', response.razorpay_payment_id)
                },
                "prefill": {
                    "name": "{{ auth()?->user()?->name }}",
                    "email": "{{ auth()?->user()?->email }}",
                    "contact": "{{ auth()?->user()?->phone }}"
                },
                "notes": {
                    "address": 'DUMMY ADDRESS'
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        })
    </script>
@endpush
    
</div>

