@php
$routeName = request()->route()->getName();
$sidebars = [
   'dashboard' => [
      'title' => 'Dashboard',
      'icon' => 'fas fa-tachometer-alt',
      'route' => 'dashboard',
      'active' => str_contains($routeName, 'dashboard'),
      'sub' => []
   ],
   
   'envato' => [
      'title' => 'Envato Settings',
      'icon' => 'fas fa-cogs',
      'route' => 'admin.settings.envato',
      'active' => str_contains($routeName, 'envato'),
      'sub' => []
   ],
   
   'packages' => [
      'title' => 'Packages',
      'icon' => 'fas fa-box',
      'route' => 'admin.packages',
      'active' => str_contains($routeName, 'packages'),
      'sub' => []
   ],
   
   'transactions' => [
      'title' => 'Transactions',
      'icon' => 'fas fa-exchange-alt',
      'route' => 'admin.purchases',
      'active' => str_contains($routeName, 'purchases'),
      'sub' => []
   ],
   
   'pages' => [
    'title' => 'Pages',
    'icon' => 'fas fa-book',
    'route' => 'admin.pages',
    'active' => str_contains($routeName, 'pages'),
    'sub' => []
  ]
   
];
$settings = \App\Models\Setting::get();
@endphp



<div class="sidebar print:hidden">
    <!-- Main Sidebar -->
    <div class="main-sidebar">
      <div class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
        <!-- Application Logo -->
        <div class="flex pt-4">
            <x-authentication-card-logo :logo="$settings?->where('key', 'logo')?->value('value')" class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"/>
        </div>

        <!-- Main Sections Links -->
        <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
          <!-- Dashobards -->
          
          @foreach ($sidebars as $sidebar)
          <x-lists :name="$sidebar['title']" :route="route($sidebar['route'])" :active="$sidebar['active']">
            <i class="text-xl {{ $sidebar['icon'] }}"></i>
          </x-lists>
          @endforeach
        </div>

        <!-- Bottom Links -->
        <div class="flex flex-col items-center space-y-3 py-3">
          <!-- Settings -->
          <a href="{{ route('admin.settings') }}" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-opacity="0.3" fill="currentColor" d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z"/>
              <path fill="currentColor" d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z"/>
            </svg>
          </a>

          <!-- Profile -->
          <div x-data="usePopper({placement:'right-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
            <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
              <img class="rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
              <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
            </button>

            <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
              <div class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                  <div class="avatar h-14 w-14">
                    <img class="rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                  </div>
                  <div>
                    <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        {{ Auth::user()->name }}
                    </a>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                       {{ Auth::user()->type ?? 'user' }}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col pt-2 pb-5">
                  <a href="{{ route('admin.settings') }}" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                      </svg>
                    </div>

                    <div>
                      <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                        Profile
                      </h2>
                      <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                        Your profile setting
                      </div>
                    </div>
                  </a>
                  
                  <div class="mt-3 px-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                          </svg>
                          <span>Logout</span>
                        </button>
                    </form>
                    {{--  <button class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                      </svg>
                      <span>Logout</span>
                    </button>  --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
      <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
        <!-- Sidebar Panel Header -->
        <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
          <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
            Dashboards
          </p>
          <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
          </button>
        </div>

        <!-- Sidebar Panel Body -->
        <div x-data="{expandedItem:null}" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);">
          <ul class="flex flex-1 flex-col px-4 font-inter">
            <li>
              <a x-data="navLink" href="{{ route('dashboard') }}" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                Dashboard
              </a>
            </li>
          </ul>
          <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
          <ul class="flex flex-1 flex-col px-4 font-inter">
            {{--  <li x-data="accordionItem('menu-item-1')">
              <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out" href="javascript:void(0);">
                <span>Cryptocurrency</span>
                <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
              </a>
              <ul x-collapse x-show="expanded">
                <li>
                  <a x-data="navLink" href="dashboards-crypto-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                    <div class="flex items-center space-x-2">
                      <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                      <span>Cryptocurrency v1</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a x-data="navLink" href="dashboards-crypto-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                    <div class="flex items-center space-x-2">
                      <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                      <span>Cryptocurrency v2</span>
                    </div>
                  </a>
                </li>
              </ul>
            </li>  --}}
            
            @foreach ($sidebars as $sidebar)
            @if($sidebar['active'] == true && count($sidebar['sub']) > 0)
            @foreach($sidebar['sub'] as $sub)
            <li>
              <a x-data="navLink" href="{{ route($sub['route']) }}" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                {{ $sub['title'] }}
              </a>
            </li>
            @endforeach
            @endif
            @endforeach
        
          </ul>
          
        </div>
      </div>
    </div>
  </div>