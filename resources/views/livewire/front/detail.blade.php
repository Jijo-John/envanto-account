<div>
    
    @if(isset($item['item']))
    <div class="lg:p-12 p-2 lg:px-12 mt-12 ">
        
        @if(auth()?->check() && \Carbon\Carbon::now()->greaterThan(auth()->user()->purchases?->value('subscription_end')))
        <span class="mb-5 flex items-center gap-3 justify-center bg-[#ff4d6a] w-full p-3 px-5 rounded-[0px] mt-3">
           <p class="text-white">
            Your subscription has been expired. Please subscribe to download this item. for more details
           </p> <a href="{{ route('user.payment_options') }}" class="text-black"><h4>click here</h4></a>
        </span>
        @endif

        <p class="font-semibold">
            @if(isset($item['crumbs'][0]))
            @foreach ($item['crumbs'][0] as $crumb)
            <a href="{{ route('home') }}" class="text-[#7726b5]">
                {{ $crumb['label'] }} /
            </a>
            @endforeach
            @endif
        </p>

        <h4 class="text-2xl font-bold mt-3">
            {{ $item['item']['title'] }}
        </h4>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">

            <div class="flex flex-col">

                <div class="h-3/4 w-full">
                    <img class="w-screen"
                        src="{{ $item['item']['coverImageUrls']['og1200x630'] ?? 'https://vishwaentertainers.com/wp-content/uploads/2020/04/No-Preview-Available.jpg' }}">
                </div>


                <p class="font-semibold mt-8">
                    {!! $item['descriptionHtml'] !!}
                </p>

                {{--  <ul class="mt-2">
                    <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            10 Abstract Backgrounds
                        </p>
                    </li>

                    <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            3000x2000 px
                        </p>
                    </li>

                </ul>  --}}

            </div>


            <div>

                <div class="bg-gray-100 lg:p-12 p-5 flex flex-col justify-center mb-5">
                    <button wire:click.prevent="download" class="bg-[#7726b5] w-full text-white p-3 px-5 rounded-[0px]">
                        <i class="fa fa-download"></i>
                        Download
                    </button>

                    <a target="__blank" href="{{ isset($item['item']['itemAttributes']['demoUrl']) ? $item['item']['itemAttributes']['demoUrl'] : '#' }}" class="flex items-center gap-3 justify-center bg-[#ff4d6a] w-full text-white p-3 px-5 rounded-[0px] mt-3">
                        <i class="fa fa-eye"></i>
                        Preview
                    </a>
                    
                    <p> License Type : trail </p>   
                    
                </div>

                <p class="text-2xl font-bold mb-5">
                    Enjoy all benefits of this bundle and envato elements subscription
                </p>

                <ul>
                    <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            Millions of creative assets
                        </p>
                    </li>

                    <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            Unlimited Downloads
                        </p>
                    </li>

                    {{--  <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            Simple Commercial License
                        </p>
                    </li>

                    <li class="flex gap-2 items-center mt-2">
                        <i class="fa fa-circle text-[#7726b5]"></i>
                        <p class="font-semibold">
                            1 Month plan
                        </p>
                    </li>  --}}

                </ul>


            </div>




        </div>


        <div class="grid lg:grid-cols-2 grid-cols-1 mt-4">

            <div>

                <span class="font-bold mt-4 text-2xl mt-4">Product Tags </span>

                <div class="grid grid-cols-4 lg:grid-cols-6 gap-2 mt-5 text-white">
                    @foreach ($item['item']['tags'] as $tag)
                    <div class="bg-[#7726b5] rounded-lg p-3 flex items-center justify-center">
                        {{ $tag }}
                    </div>
                    @endforeach

                </div>

            </div>

        </div>




    </div>
    @endif
    
</div>
