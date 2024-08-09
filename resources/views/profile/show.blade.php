<x-app-layout>
    
    <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
         Profile
        </h2>
        <div class="hidden h-full py-1 sm:flex">
          <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
          <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">User</a>
            <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </li>
          <li>Show</li>
        </ul>
      </div>
      
    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-4">
          <div class="card p-4 sm:p-5">
            <div class="flex items-center space-x-4">
              <div class="avatar h-14 w-14">
                <img class="rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="avatar">
              </div>
              <div>
                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                    {{ Auth::user()->name }}
                </h3>
                <p class="text-xs+">
                    {{ Auth::user()->type ?? 'user' }}
                </p>
              </div>
            </div>
            <ul class="mt-6 space-y-1.5 font-inter font-medium">
              <li>
                <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <span>Account</span>
                </a>
              </li>
              {{--  <li>
                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                  </svg>

                  <span>Notification</span>
                </a>
              </li>
              <li>
                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                  </svg>
                  <span>Security</span>
                </a>
              </li>
              <li>
                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                  </svg>
                  <span>Apps</span>
                </a>
              </li>
              <li>
                <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                  </svg>
                  <span> Privacy &amp; data </span>
                </a>
              </li>  --}}
            </ul>
          </div>
        </div>
        <div class="col-span-12 lg:col-span-8">
          <div class="card">
            <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
              <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                Account Setting
              </h2>
              <div class="flex justify-center space-x-2">
                {{--  <button class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                  Cancel
                </button>
                <button class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  Save
                </button>  --}}
              </div>
            </div>
            <div class="p-4 sm:p-5">
              <div class="flex flex-col">
                <span class="text-base font-medium text-slate-600 dark:text-navy-100">Avatar</span>
                <div class="avatar mt-1.5 h-20 w-20">
                  <img class="mask is-squircle" src="{{ Auth::user()->profile_photo_url }}" alt="avatar">
                  <div class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700">
                    <button class="btn h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              @livewire('profile.update-profile-information-form')
              <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
              <div>
                <h3 class="text-base font-medium text-slate-600 dark:text-navy-100">
                  Linked Accounts
                </h3>
                <p class="text-xs+ text-slate-400 dark:text-navy-300">
                  Lorem ipsum dolor sit amet consectetur.
                </p>
                <div class="flex items-center justify-between pt-4">
                  <div class="flex items-center space-x-4">
                    <div class="h-12 w-12">
                        <svg  viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M90 50.8965C90 48.2733 89.7675 45.7829 89.3691 43.3589H51.8467V58.3346H73.3308C72.3678 63.249 69.5453 67.3997 65.3614 70.2222V80.1839H78.1788C85.6833 73.2439 90 63.0166 90 50.8965Z" fill="#4285F4"/>
                            <path d="M51.8467 89.8467C62.6053 89.8467 71.6041 86.2605 78.1788 80.1839L65.3614 70.2222C61.7752 72.613 57.226 74.0741 51.8467 74.0741C41.4534 74.0741 32.6539 67.0677 29.4993 57.6041H16.2835V67.8646C22.825 80.8812 36.2733 89.8467 51.8467 89.8467Z" fill="#34A853"/>
                            <path d="M29.4994 57.6041C28.6692 55.2133 28.2375 52.6565 28.2375 50C28.2375 47.3436 28.7024 44.7867 29.4994 42.3959V32.1354H16.2835C13.5607 37.5147 12 43.5581 12 50C12 56.4419 13.5607 62.4853 16.2835 67.8646L29.4994 57.6041Z" fill="#FBBC05"/>
                            <path d="M51.8467 25.9259C57.7241 25.9259 62.9706 27.9515 67.1213 31.9029L78.4776 20.5466C71.6041 14.1047 62.6053 10.1533 51.8467 10.1533C36.2733 10.1533 22.825 19.1188 16.2835 32.1354L29.4993 42.3959C32.6539 32.9323 41.4534 25.9259 51.8467 25.9259Z" fill="#EA4335"/>
                        </svg>
                    </div>
                    <p class="font-medium line-clamp-1">
                      Sign In with Google
                    </p>
                  </div>
                  
                  @if(Auth::user()->google_id)
                  <button class="btn h-8 rounded-full border border-slate-200 px-3 text-xs+ font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Connected
                  </button>
                  @else
                  <a class="btn h-8 rounded-full border border-slate-200 px-3 text-xs+ font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Connect
                  </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    
    {{--  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>  --}}
</x-app-layout>
