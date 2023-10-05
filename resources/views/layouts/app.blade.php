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
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <!-- Scripts -->
        {{-- <link rel="stylesheet" href="{{asset('build/assets/app-d2b2370e.css')}}"> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased dark">
        {{-- <x-banner /> --}}

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <x-footer/>
        </div>

        @stack('modals')
         @stack('scripts')
<script>
    window.addEventListener('livewire:navigated', () => {
    window.scrollTo({ top: 0 });
});
</script>

        @livewireScripts
    </body>
</html>
