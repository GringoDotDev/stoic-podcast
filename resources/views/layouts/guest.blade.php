<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Filament -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentScripts
    @livewire('notifications')

    <script type="text/javascript" data-navigate-once>
        document.addEventListener('livewire:navigating', () => {
            // remove dangling notifications
            document.querySelectorAll('.fi-no').forEach((e) => e.remove())
        })
    </script>
</head>
<body class="font-sans text-gray-900 antialiased">
{{$slot}}
</body>
</html>
