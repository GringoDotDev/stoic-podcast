<?php

use function Livewire\Volt\{state, computed};

/** @var \App\Models\Episode $episode */
state('episode')->reactive();
state(['expanded' => false]);

$downloadFile = fn() => Storage::disk('public')->download($this->episode->file_path);

?>

<div class="flex flex-col gap-4 w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-6">
    <p class="font-extralight text-gray-400 text-sm">{{ $episode->updated_at->toFormattedDateString() }}</p>
    <h1 class="text-lg font-semibold">
        {{$episode->title}}
    </h1>
    <audio controls src="{{ Storage::disk('public')->url($episode->file_path) }}"></audio>
    <p class="truncate" :class="{ 'truncate': !$wire.expanded }">
        <span>{{$episode->transcript}}</span>
    </p>
    <div>
        <x-primary-button x-on:click="$wire.expanded = !$wire.expanded">
            <span x-text="$wire.expanded ? 'Show Less' : 'Show More'">Show More</span>
        </x-primary-button>
        <x-secondary-button wire:click="downloadFile">
            Download
        </x-secondary-button>
    </div>
</div>
