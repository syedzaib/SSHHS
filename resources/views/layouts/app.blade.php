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
         <link rel="stylesheet" href="{{  asset('assets/css/style.css')  }}">
         <link rel="apple-touch-icon" sizes="180x180" href="{{  asset('assets/images/apple-touch-icon.png')  }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{  asset('assets/images/favicon-32x32.png')  }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('assets/images/favicon-16x16.png')  }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">

         @include('partials.header')

        <div class="flex overflow-hidden bg-white pt-16">

        {{-- Sidebar --}}
      @include('partials.sidebar')
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

  
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">

        {{-- Main Content --}}
        <main class="flex-1 p-4 ">
             {{ $slot }}
        </main>

        {{-- Footer --}}
        @include('partials.footer')
        </div>
    </div>
    <script async defer src="{{  asset('assets/js/buttons.js')  }}"></script>
    <script src="{{  asset('assets/js/themeapp.js')  }}"></script>
    </body>
</html>
