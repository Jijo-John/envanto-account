<div class="mb-3">
    <header>
        <div class="lg:p-6 p-2">
            <div class="flex justify-between">
                <a href="{{ route('home') }}" class="lg:px-12 px-2 py-1 text-2xl font-bold">
                    <img style="max-width: 70px;max-height: 70px;" src="{{ $settings?->where('key', 'logo')?->value('value') }}" alt="logo" class="h-10 w-10 inline-block" />
                </a>
                
                <div class="flex gap-5">
                    
                    
                    <a href="{{ route('home') }}" class="flex gap-2 items-center">
                        <i class="fa fa-home" style="font-size: 22px;"></i>
                        <p class="hidden md:block text-1xl font-bold uppercase">
                            Home
                        </p>
                    </a>
                    
                    <a href="{{ route('packages') }}" class="flex gap-2 items-center">
                        <i class="fa fa-cube text-1xl" style="font-size: 20px;"></i>
                        <p class="hidden md:block text-1xl font-bold uppercase">
                            Packages
                        </p>
                    </a>
                    
                    @foreach ($pages as $page)
                    <a href="{{ route('item.slug', $page->slug) }}" class="flex gap-2 items-center">
                        <p class="hidden md:block text-1xl font-bold uppercase">
                            {{ $page?->title }}
                        </p>
                    </a>
                    @endforeach
                    
                    
                </div>
              
                
              
                @if(auth()->check())
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('user.profile') }}" class="flex gap-2 items-center">
                        <i class="fa fa-user-circle-o" style="font-size: 20px;"></i>
                        <p class="hidden md:block text-1xl font-bold uppercase">
                            My Account
                        </p>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="flex gap-2 items-center">
                            <i class="fa fa-sign-out" style="font-size: 20px;"></i>
                            <p class="hidden md:block text-1xl font-bold uppercase">
                                Logout
                            </p>
                        </button>
                    </form>
                </div>
                
                @else
                <a href="{{ route('auth.login') }}" class="flex gap-2 items-center">
                    <i class="fa fa-sign-in" style="font-size: 22px;"></i>
                    <p class="hidden md:block text-1xl font-bold uppercase" >
                        Login
                    </p>
                </a>
                @endif
            </div>
        </div>
    </header>
</div>