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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Updated background to use gradient background with elegant colors -->
        <div class="min-h-screen" style="background: linear-gradient(135deg, #f5f3f0 0%, #ede9e4 100%);">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <!-- Updated header styling with modern design -->
                <header style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border-bottom: 1px solid #e8e4df; box-shadow: 0 2px 8px rgba(30, 27, 24, 0.08);">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div style="color: #1e1b18;">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
