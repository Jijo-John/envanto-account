<div>
   
    <div class="flex gap-3 p-5 lg:px-12  mt-12 lg:mt-28 mb-4">
        <div class="hidden md:block w-full">
            <img src="{{ asset('images/login.png') }}" alt="login">
        </div>

        <div class="w-full">
            <p class="lg:text-5xl text-3xl font-bold text-center pb-3">
                Welcome Back!
            </p>

            <p class="lg:text-2xl text-sm text-center pb-3">
                Create an account to continue
            </p>

            <form wire:submit.prevent="submit">
            <div class="flex flex-col gap-3 mt-5">

                <div class="w-full flex flex-col gap-2">
                    <p>
                        Name
                    </p>

                    <input type="text" wire:model="name"
                        class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="Name">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div class="w-full flex flex-col gap-2">
                    <p>
                        Email Address
                    </p>

                    <input type="text" wire:model="email"
                        class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="Email Address">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p>
                        Phone Number
                    </p>

                    <div class="flex">
                        <select wire:mode="country_code" class="w-16 rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                            @foreach ($codes as $code)
                            <option value="{{ $code }}">{{ $code }}</option> 
                            @endforeach
                        </select>
                        <input type="number" wire:model="phone"
                            class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                            placeholder="Phone">
                    </div>
                    @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                
                {{--  $state, $city, $country  --}}
                
                <div class="w-full flex flex-col gap-2">
                    <p>
                        Country
                    </p>

                    <input type="text" wire:model="country"
                        class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="Country">
                    @error('country') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                
                <div class="w-full flex flex-col gap-2">
                    <p>
                        State
                    </p>

                    <input type="text" wire:model="state"
                        class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="State">
                    @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                
                <div class="w-full flex flex-col gap-2">
                    <p>
                        City
                    </p>

                    <input type="text" wire:model="city"
                        class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="City">
                    @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                

                <div class="w-full flex flex-col gap-2">
                    <p>
                        Password
                    </p>

                    <input type="password" wire:model="password"
                        class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="Password">
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <p>
                        Confirm Password
                    </p>

                    <input type="password" wire:model="password_confirmation"
                        class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                        placeholder="Confirm Password">
                    @error('password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-[#7726b5] text-white p-3 px-5">
                    <i class="fa fa-spinner fa-spin" wire:loading wire:target="submit"></i>  Sign In
                </button>
            </div>
        </form>



            <div class="mt-5 flex flex-col gap-5">

                <p>
                    Already have an account? <a href="{{ route('auth.login') }}" class="text-[#7726b5]">Sign In</a>
                </p>

                <!-- <div class="flex gap-2 items-center">
                    <hr class="w-1/2">
                    <p class="font-semibold">
                        OR
                    </p>
                    <hr class="w-1/2">
                </div> -->

                <!-- <div class="flex gap-2 items-center justify-center">
                    <button class="bg-[#3b5998] text-white p-3 px-5">
                        <i class="fa fa-facebook"></i>
                    </button>
                    <button class="bg-[#00acee] text-white p-3 px-5">
                        <i class="fa fa-twitter"></i>
                    </button>
                    <button class="bg-[#db4437] text-white p-3 px-5">
                        <i class="fa fa-google"></i>
                    </button>
                </div> -->


            </div>


        </div>


    </div>
    
    
</div>
