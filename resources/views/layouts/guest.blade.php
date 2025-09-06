<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Next Crumb') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen flex items-center justify-center"
      style="background-image: url('{{ asset('logo/back.jpg') }}'); background-size: cover; background-position: center;">

    <!-- Transparent form with blur -->
    <div class="bg-white/20 backdrop-blur-md shadow sm:rounded-lg p-6 relative z-10 w-full max-w-md">
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>
