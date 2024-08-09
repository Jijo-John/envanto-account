<x-home-layout>
    
    <div class="lg:p-12 p-2 lg:px-12 mt-12">

        <div class="flex md:flex-row flex-col gap-4">

            @include('menu')

            @if($purchase)
            <div class="w-full">

                <div class="text-center bg-[#7726b5] p-3 uppercase font-bold text-white">
                    {{ $purchase?->created_at->format('d M Y') }}
                </div>
                <div class="p-4 px-4 py-3 bg-white shadow">

                    <p class="text-[#7726b5] font-semibold">
                        {{ $purchase?->package?->name }}
                    </p>

                    <p class="font-semibold mt-4">
                        Your Subscription Plan will be expired on {{ \Carbon\Carbon::parse($purchase->subscription_end)->format('d M Y') }}.
                        Please renew your subscription plan to continue using our services.
                    </p>

                    <div class="mt-4">
                        @if(\Carbon\Carbon::parse($purchase->subscription_end)->isPast())
                        @livewire('user.payment-options', ['package_id' => $purchase->package_id])
                        @else
                        <button class="disabled bg-[#7726b5] text-white p-2 rounded-md w-full">
                            Active Subscription
                        </button>
                        @endif
                    </div>

                </div>



            </div>
            @else
            <div class="w-full">
                <div class="text-center bg-[#7726b5] p-3 uppercase font-bold text-white">
                    There are no active subscription plans. <a href="{{ route('packages') }}" style="color: violet;" class="text-white underline">Click here</a> to subscribe.
                </div>
            </div>
            @endif


        </div>

    </div>
    
    
</x-home-layout>