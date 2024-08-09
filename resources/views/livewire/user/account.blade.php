<div>

    <div class="lg:p-12 p-2 lg:px-12 mt-12">

        <div class="flex md:flex-row flex-col gap-4">

            @include('menu')

            <div class="bg-white shadow p-4 w-full">

                <form wire:submit.prevent="update">
                    <div class="flex flex-col gap-3 mt-5">

                        <div class="w-full flex flex-col gap-2">
                            <p>
                                Name
                            </p>

                            <input type="text" value="{{ auth()->user()->name }}" readonly
                                class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                                placeholder="Name">
                        </div>


                        <div class="w-full flex flex-col gap-2">
                            <p>
                                Email Address
                            </p>

                            <input type="text" value="{{ auth()->user()->email }}" readonly
                                class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                                placeholder="Email Address">
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <p>
                                Phone Number
                            </p>

                            <div class="flex">
                                <input type="number" value="{{ auth()->user()->phone }}" readonly
                                    class="w-full rounded-[0px] p-3 bg-gray-100 hover:bg-gray-200 focus:outline-none"
                                    placeholder="Phone">
                            </div>

                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <p>
                                Password
                            </p>

                            <input type="password" wire:model="password"
                                class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                                placeholder="Password">
                            @error('password')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <p>
                                Confirm Password
                            </p>

                            <input type="password" wire:model="password_confirmation"
                                class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none"
                                placeholder="Confirm Password">
                            @error('password_confirmation')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                        <button type="submit" class="bg-[#7726b5] text-white p-3 px-5">
                            <i class="fa fa-spinner fa-spin" wire:loading wire:target="update"></i> Update
                        </button>
                    </div>
                </form>

            </div>


        </div>

    </div>

</div>
