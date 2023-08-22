<?php

use function Laravel\Folio\name;

name('home');
?>

@php
    use App\Models\Episode;
    $episodes = Episode::query()->orderBy('created_at', 'desc')->get();
@endphp

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 w-full min-h-screen">
    <img alt="Stoic philosopher making a podcast" src="/hero-md.png" class="max-w-xl pt-6"/>
    <h1 class="font-semibold text-2xl my-4">The Stoic Developer</h1>
    <h2 class="text-lg max-w-lg text-center">Classic passages of Stoic philosophy brought to life. Open source and built
        with
        Laravel.</h2>
    <div class="flex flex-wrap justify-center my-6 gap-4">
        <a href="https://youtube.com/@GringoDotDev" target="_blank">
            <x-logos.youtube-logo class="w-8 h-8"/>
        </a>
        <a href="https://twitter.com/GringoDotDev" target="_blank">
            <x-logos.x-logo class="w-8 h-8"/>
        </a>
        <a href="https://github.com/GringoDotDev">
            <x-logos.github-logo class="w-8 h-8"/>
        </a>
    </div>
    <div>
        <h1 class="font-semibold text-3xl mb-6">Episodes</h1>
        @forelse($episodes as $episode)
            <livewire:episode-tile :episode="$episode"/>
        @empty
            <p>No episodes yet.</p>
        @endforelse
    </div>
</div>

</body>
</html>

