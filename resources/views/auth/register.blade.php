<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <span class="relative mt-1.5 flex">
                {{--  <x-label for="name" value="{{ __('Name') }}" />  --}}
                <x-input id="name" placeholder="Name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <i class="far fa-user text-base"></i>
                  </span>
                </span>
            </div>

            <div class="mt-4">
                {{--  <x-label for="email" value="{{ __('Email') }}" />  --}}
                <span class="relative mt-1.5 flex">
                <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </span>
            </span>
            </div>

            <div class="mt-4">
                {{--  <x-label for="password" value="{{ __('Password') }}" />  --}}
                <span class="relative mt-1.5 flex">
                <x-input id="password" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                  </span>
                </span>
            </div>

            <div class="mt-4">
                {{--  <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />  --}}
                <span class="relative mt-1.5 flex">
                <x-input id="password_confirmation" placeholder="Confirm Password" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                  </span>
                </span>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4 flex items-center space-x-2">
                    <x-checkbox id="terms" name="terms" />
                    <div class="line-clamp-1">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            @endif
            
            
            <x-button class="ms-4">
                {{ __('Register') }}
            </x-button>

            <div class="mt-4 text-center text-xs+">
                
                <p class="line-clamp-1">
                    <span>Already have an account? </span>
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="{{ route('login') }}">
                        {{ __('Sign In') }}
                    </a>
                  </p>
            </div>
            
            <div class="my-7 flex items-center space-x-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                <p class="text-tiny+ uppercase">or sign up with email</p>
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
              </div>
            
        </form>
        
        <div class="flex space-x-4">
            <a href="{{ route('auth.google') }}" class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
              <svg   class="h-5.5 w-5.5"  viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M90 50.8965C90 48.2733 89.7675 45.7829 89.3691 43.3589H51.8467V58.3346H73.3308C72.3678 63.249 69.5453 67.3997 65.3614 70.2222V80.1839H78.1788C85.6833 73.2439 90 63.0166 90 50.8965Z" fill="#4285F4"/>
                <path d="M51.8467 89.8467C62.6053 89.8467 71.6041 86.2605 78.1788 80.1839L65.3614 70.2222C61.7752 72.613 57.226 74.0741 51.8467 74.0741C41.4534 74.0741 32.6539 67.0677 29.4993 57.6041H16.2835V67.8646C22.825 80.8812 36.2733 89.8467 51.8467 89.8467Z" fill="#34A853"/>
                <path d="M29.4994 57.6041C28.6692 55.2133 28.2375 52.6565 28.2375 50C28.2375 47.3436 28.7024 44.7867 29.4994 42.3959V32.1354H16.2835C13.5607 37.5147 12 43.5581 12 50C12 56.4419 13.5607 62.4853 16.2835 67.8646L29.4994 57.6041Z" fill="#FBBC05"/>
                <path d="M51.8467 25.9259C57.7241 25.9259 62.9706 27.9515 67.1213 31.9029L78.4776 20.5466C71.6041 14.1047 62.6053 10.1533 51.8467 10.1533C36.2733 10.1533 22.825 19.1188 16.2835 32.1354L29.4993 42.3959C32.6539 32.9323 41.4534 25.9259 51.8467 25.9259Z" fill="#EA4335"/>
            </svg>
              <span>Google</span>
          </a>
            
          </div>
        
    </x-authentication-card>
</x-guest-layout>
