<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- <style>

        body {
            background-image: url('{{ asset('images/backgroundimageadmin.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
    </style> -->
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col min-h-screen bg-gray-100 bg-opacity-80 backdrop-blur-md">

        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white bg-opacity-70 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main class="flex-grow py-6 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>

        <footer class="bg-gray-800 text-white text-center py-4">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </footer>
    </div>
</body>

</html>