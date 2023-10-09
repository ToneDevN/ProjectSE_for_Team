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

        {{-- css --}}
        <link rel="stylesheet" href="{{url('css/style.css')}}">

        {{-- Icons --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            @include('layouts.navigation')
            

            <!-- Page Heading -->

            <!-- Page Content -->
            <main>
               
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
