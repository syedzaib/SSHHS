<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="{{  asset('assets/css/style.css')  }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{  asset('assets/images/apple-touch-icon.png')  }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{  asset('assets/images/favicon-32x32.png')  }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('assets/images/favicon-16x16.png')  }}"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center py-6">
            <div>
                
                <a href="/" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-10 mr-4" alt="SSHHS Logo">
                </a>
                <h2 class="text-xl font-semibold pt-4">Membership Platform | SSHHS</h2>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        {{-- <script async defer src="{{  asset('assets/js/buttons.js')  }}"></script>
    <script src="{{  asset('assets/js/themeapp.js')  }}"></script> --}}
    </body>
</html>
