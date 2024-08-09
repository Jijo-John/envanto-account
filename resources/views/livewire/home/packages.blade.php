<div>


    <div class="w-full 2xl:w-3/4 flex items-center justify-center px-8 md:px-32 lg:px-16 2xl:px-0 mx-auto -mt-8">
        <div class="w-full grid grid-cols-1 xl:grid-cols-3 gap-8">

            @foreach ($packages as $package)
                <div class="bg-white shadow-2xl rounded-lg py-4">
                    <p class="text-xl text-center font-bold text-[#7726b5]">
                        {{ $package->name }}
                    </p>
                    <p class="text-center py-8">
                        <span class="text-4xl font-bold text-gray-700">
                            <span>&#8377;</span>
                            <span x-text="basicPrice">
                                {{ $package->price }}
                            </span>
                        </span>
                        <span class="text-xs uppercase text-gray-500">
                            / <span x-text="billingType">month</span>
                        </span>
                    </p>
                    <ul class="border-t border-gray-300 py-8 space-y-6">

                        @foreach ($package->items as $item)
                            @if ($item->is_active)
                                <li class="flex items-center space-x-2 px-8">
                                    <span class="bg-[#7726b5] rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600 capitalize">
                                        {{ $item->name }}
                                    </span>
                                </li>
                            @else
                                <li class="flex items-center space-x-2 px-8">
                                    <span class="bg-gray-300 rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <span class="text-gray-400 capitalize">
                                        {{ $item->name }}
                                    </span>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                    <div class="flex items-center justify-center mt-6">
                        <a id="loading" href="javascript:;" wire:click="checkout('{{ $package?->id }}')"
                            class="bg-[#7726b5] hover:bg-blue-700 px-8 py-2 text-sm text-gray-200 uppercase rounded font-bold transition duration-150"
                            title="Purchase">
                           <i class="fa fa-spinner fa-spin" wire:loading wire:target="checkout('{{ $package?->id }}')"></i>
                            Subscribe
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
