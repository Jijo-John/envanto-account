<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ $settings?->where('key', 'logo')?->value('value') }}" />
    <title>{{ $settings?->where('key', 'title')?->value('value') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src=" https://cdn.jsdelivr.net/npm/heroicons-css@0.1.1/heroicons.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/heroicons-css@0.1.1/heroicons.min.css " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/css/home.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <div class="flex flex-col h-screen justify-between">

        <!-- header start -->
        @include('layouts.partials.header', ['settings' => $settings, 'pages' => $pages])
        <!-- header ends -->


        <!-- content starts -->
        <div>
            {{ $slot }}
        </div>
        <!-- content ends -->

        <!-- footer -->
        <div>

            <div
                class="mb-3 flex gap-4 p-3 lg:justify-center text-xs items-center text-center lg:text-[20px] overflow-x-auto">
                <p>
                    Stack Videos
                </p>

                <p>
                    Video Templates
                </p>

                <p>
                    Music
                </p>

                <p>
                    Sounds Effects
                </p>

                <p>
                    Graphic Templates
                </p>

                <p>
                    Presentation Templates
                </p>

                <p>
                    Fonts
                </p>

                <p>
                    Photos
                </p>

                <p>
                    Add-ons More
                </p>

            </div>

            @include('layouts.partials.footer')

        </div>
        <!-- footer ends -->

    </div>

    <div id="snackbar">Some text some message..</div>

    @livewireScripts
    @stack('scripts')

    <script>
        function showSnackbar(msg) {
            var x = document.getElementById("snackbar");
            x.innerHTML = msg;
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        window.addEventListener('show-snackbar', event => {
            showSnackbar(event.detail.message);
        });
        
        window.addEventListener('open-new-tab', event => {
            window.open(event.detail.url, '_blank');
        });
        
    </script>

</body>

</html>
