<?php

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{on, computed};
use App\Models\User;

middleware(['auth', 'verified']);
name('dashboard');

$favoriteEpisodes = computed(fn(
) => \App\Models\FavoriteEpisode::with('episode')->where(['user_id' => auth()->id()])->get());

on([
    'favorite-removed' => function () {
        unset($this->favoriteEpisodes);
    }
]);

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden flex flex-col items-center">
                <h2 class="text-2xl font-semibold">Favorites</h2>
                @volt
                <div class="p-6 text-gray-900 flex flex-col items-center">
                    @foreach($this->favoriteEpisodes as $favorite)
                        <livewire:episode-tile :episode="$favorite?->episode" :key="$favorite?->id"/>
                    @endforeach

                    @if($this->favoriteEpisodes->count() === 0)
                        <p class="text-center -mt-2 mb-4">No favorites yet.</p>
                        <a href="{{ route('home') }}" wire:navigate>
                            <x-primary-button>View Episodes</x-primary-button>
                        </a>
                    @endif
                </div>
                @endvolt
            </div>
        </div>
    </div>
</x-app-layout>
