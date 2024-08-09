<x-home-layout>


    <div class="min-h-full pb-12 pt-6 p-3 text-black">
        
        <div class="w-full pt-16 text-center mb-5">
            <h4 class="text-2xl">
                {{ $page?->title }}
            </h4>
        </div>
        
        
        {!! $page?->content !!}
        
    </div>


</x-home-layout>
