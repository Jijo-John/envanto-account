<x-home-layout>

    <div class="flex flex-col gap-5">
        <p class="lg:text-5xl text-3xl font-bold text-center">
            Lets get started.
        </p>

        <p class="lg:text-5xl text-3xl font-bold text-center">
            Marketplace for Digital Themes & Plugins
        </p>

        <p class="lg:text-2xl text-sm text-center">
            New Products on the Marketplace. Your dream site download!
        </p>

        <form action="{{ route('search') }}">
          <div class="flex justify-center mt-5 px-2">
            <select name="item_type" class="p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none border-none lg:w-48 w-12">
                <option value="">All</option>
                @foreach ($item_types as $key => $item_type)
                    <option value="{{ $key }}">
                        {{ $item_type }}
                    </option>
                @endforeach
            </select>
            <input type="text" name="search" required
                class="lg:w-1/2 w-3/4 p-3 rounded-[0px] bg-gray-100 hover:bg-gray-200 focus:outline-none border-none"
                placeholder="Search for themes & plugins">
            <button type="submit" class="bg-[#7726b5] text-white p-3 px-5" >
                <i class="fa fa-search"></i>
            </button>
        </div>
        </form>
        

    </div>

</x-home-layout>
