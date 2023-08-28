<?php

use function Laravel\Folio\name;
use function Livewire\Volt\computed;

name('home');
$episodes = computed(fn() => App\Models\Episode::query()->orderBy('created_at', 'desc')->get());

?>

<x-guest-layout>
    <div class="flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 w-full min-h-screen">
        <img alt="Stoic philosopher making a podcast" src="/hero-md.png" class="max-w-xl pt-6"/>
        <h1 class="font-semibold text-2xl my-4">The Stoic Developer</h1>
        <h2 class="text-lg max-w-lg text-center">Classic passages of Stoic philosophy brought to life. Open source and
            built
            with
            Laravel.</h2>
        <div class="flex flex-wrap justify-center my-8 gap-4">
            <a href="https://youtube.com/@GringoDotDev" target="_blank">
                <x-logos.youtube-logo class="w-8 h-8"/>
            </a>
            <a href="https://twitter.com/GringoDotDev" target="_blank">
                <x-logos.x-logo class="w-8 h-8"/>
            </a>
            <a href="https://github.com/GringoDotDev/stoic-podcast" target="_blank">
                <x-logos.github-logo class="w-8 h-8"/>
            </a>
        </div>
        <div>
            @if(!auth()->check())
                <a href="{{ route('register') }}" wire:navigate>
                    <x-primary-button>Sign Up or In</x-primary-button>
                </a>
            @else
                <a href="{{ route('dashboard') }}" wire:navigate>
                    <x-primary-button>Dashboard</x-primary-button>
                </a>
            @endif
        </div>
        <div class="flex-grow border-t border-gray-300 mt-6"/>
        @volt('home')
        <div class="mt-6">
            <h1 class="font-semibold text-3xl mb-6">Episodes</h1>
            @forelse($this->episodes as $episode)
                <livewire:episode-tile :episode="$episode" :key="$episode->id"/>
            @empty
                <p>No episodes yet.</p>
            @endforelse
        </div>
        @endvolt
    </div>
</x-guest-layout>

