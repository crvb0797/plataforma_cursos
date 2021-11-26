<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>


<body class="font-poppins antialiased">

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <footer class="bg-white shadow py-5">
        <div class="container flex flex-col md:flex-row items-center md:justify-between">
            <p class="mb-0 text-gray-500">
                Copyright © 2021
                <a href="https://villatoro.dev" class="text-info font-weight-bold">villatoro.dev</a>
            </p>
            <div>
                <a href="https://codersfree.com/politicas" class="text-sm text-blue-500 underline">Politicas de
                    privacidad</a>
                <a href="https://codersfree.com/terminos" class="text-sm ml-3 text-blue-500 underline">Terminos y
                    condiciones</a>
            </div>
        </div>

    </footer>
</body>


</html>
