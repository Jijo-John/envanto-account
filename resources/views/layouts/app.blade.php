@php
$settings = \App\Models\Setting::get();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
          {{ $settings?->where('key', 'title')?->value('value') }}
        </title>
        <link rel="icon" type="image/png" href="{{ $settings?->where('key', 'logo')?->value('value') }}" />
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/k73rosFuRWOa.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/k6XrbtP4vCfG.css') }}">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

        
        <script>
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
        </script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
        
        <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
            <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
        </div>
        
        <!-- Page Wrapper -->
        <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
          <!-- Sidebar -->
          @include('layouts.partials.sidebar')
          <!-- App Header Wrapper-->
          @include('layouts.partials.nav')
    
          <!-- Mobile Searchbar -->
          @include('layouts.partials.mobile-search')
    
          <!-- Right Sidebar -->
          @include('layouts.partials.right-sidebar')
          
    
          <!-- Main Content Wrapper -->
          <main class="main-content w-full px-[var(--margin-x)] pb-8">
          {{ $slot }}
          </main>
        </div>
        <!-- 
            This is a place for Alpine.js Teleport feature 
            @see https://alpinejs.dev/directives/teleport
          -->
        <div id="x-teleport-target"></div>
       
        <template id="custom-html-notif" @click="$notification({content:'#custom-html-notif',duration:3000})">
          <div
            class="flex max-w-xs overflow-hidden rounded-lg bg-navy-600 font-normal">
            <div class="flex items-start p-4">
              <div class="avatar h-10 w-10">
                <i class="fas fa-bell text-xl text-white"></i>
                <div
                  class="absolute right-0 h-3 w-3 rounded-full border-2 border-navy-600 bg-primary dark:bg-accent"
                ></div>
              </div>
            </div>
            <div class="p-2">
              <div class="flex items-center justify-between space-x-2">
                <h5 id="title-notification"
                  class="font-medium tracking-wide text-navy-100 line-clamp-1 lg:text-base"
                >
                </h5>
                <button
                  data-notification-remove
                  class="btn h-7 w-7 rounded-full p-0 text-white hover:bg-white/20 focus:bg-white/20 active:bg-white/25"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    ></path>
                  </svg>
                </button>
              </div>
              <p id="message-notification" class="text-navy-100"> </p>
              {{--  <div class="flex justify-end px-3 py-1">
                <a href="#" class="uppercase text-accent-light hover:underline"
                  >show</a
                >
              </div>  --}}
            </div>
          </div>
        </template>
        
        @include('layouts.partials.confirm-modal')
      
        
        <script>
          
          setInterval(function(){
            updateOnlineEvent();
          }, 180000);
          
          function updateOnlineEvent()
          {
            $.ajax({
              url: "{{ route('client_web_events') }}",
              type: "GET",
              data: {
                _token: "{{ csrf_token() }}",
              },
              success: function (data) {
                console.log(data);
              },
              error: function (data) {
                console.log(data);
              },
            });
          }
          
          updateOnlineEvent();
          window.addEventListener("DOMContentLoaded", () => Alpine.start());
          
          
          window.addEventListener('notify:modal', event => {
             document.getElementById('custom-html-notif').click();
             document.getElementById('title-notification').innerHTML = event.detail.title;
             document.getElementById('message-notification').innerHTML = event.detail.message;
          })
          
          window.addEventListener('modal:confirm', event => {
            document.getElementById('confirm-modal').click();
            document.getElementById('title-confirm').innerHTML = event.detail.title;
            document.getElementById('message-confirm').innerHTML = event.detail.message;
         })
          
        </script>
        
       
       
        @stack('modals')
        @livewireScripts
        
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
        <script>
            
            var firebaseConfig = {
                apiKey: "AIzaSyBJVe-GfTuZoQfP3L1FPRWQnLDlUrTNz7U",
                authDomain: "pushservice-95451.firebaseapp.com",
                projectId: "pushservice-95451",
                storageBucket: "pushservice-95451.appspot.com",
                messagingSenderId: "855875655722",
                appId: "1:855875655722:web:3c59dee592238a20ef4b53",
                measurementId: "G-2Y3SXH2SQR"
            };
            
            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();
            function initFirebaseMessagingRegistration() {
                messaging.requestPermission().then(function () {
                    return messaging.getToken()
                }).then(function(token) {

                    console.log(token);
                    $.ajax({
                        url: "{{ route('update_fcm_token') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            token: token
                        },
                        success: function (data) {
                            console.log(data);
                        },
                        error: function (data) {
                            console.log(data);
                        },
                    });

                }).catch(function (err) {
                    console.log(`Token Error :: ${err}`);
                });
            }

            initFirebaseMessagingRegistration();
            messaging.onMessage(function({data:{body,title}}){
                console.log('msg')
                new Notification(title, {body});
            });
            
        </script>
        
    </body>
</html>
