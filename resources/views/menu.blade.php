<div class="bg-white shadow lg:w-6/12 w-full">

    <div class="p-4">
        <a href="{{ route('user.profile') }}" class="flex gap-2 items-center">
            <p class="font-semibold text-[#7726b5]">
                Dashboard
            </p>
        </a>
    </div>

    <hr>

    <div class="p-4">
        <a href="{{ route('user.account') }}" class="text-[#7726b5]">
            <p class="font-semibold text-[#7726b5]">
                Account Information
            </p>
        </a>
    </div>

    <hr>

    <div class="p-4">
        <a href="{{ route('user.payment_options') }}">
            <p class="font-semibold text-[#7726b5]">
                Payment Options
            </p>
        </a>
    </div>
    
    <hr>

    <div class="p-4">
        <a href="{{ route('user.downloads') }}">
            <p class="font-semibold text-[#7726b5]">
                Downloads
            </p>
        </a>
    </div>

</div>