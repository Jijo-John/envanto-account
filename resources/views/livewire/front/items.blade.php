<div>

    <div class="lg:p-12 p-2 lg:px-12 mt-12">

        <p class="text-2xl font-bold">
            You found {{ count($items) }} results for “{{ $search }}”
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mt-6">
            @foreach ($items as $item)
            <a href="{{ route('item.slug', [$item['slug'].'-'. $item['id']]) }}" class="bg-white shadow rounded-lg">
                <div>
                    <img src="{{ $item['coverImageUrls']['og1200x630'] ?? '#' }}" alt=""
                        class="w-full h-48 object-cover rounded-t-lg">
                </div>
                
                <div class="p-4">
                    <p class="font-semibold overflow-hidden truncate ">
                        {{ $item['title'] }}
                    </p>
                    
                    <p class="text-gray-500 text-sm mt-2">
                        By {{ $item['contributorUsername'] }}
                    </p>
                   
                </div>
                
            </a>
            @endforeach
            
        </div>

    </div>

    
    
</div>
