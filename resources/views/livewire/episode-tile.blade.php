<?php

use function Livewire\Volt\{state, computed};

/** @var \App\Models\Episode $episode */
state('episode')->reactive();
state(['expanded' => false, 'transcriptTeaserLength' => 200]);

$exceedsTeaserLength = computed(function () {
    return strlen($this->episode->transcript) > $this->transcriptTeaserLength;
});

$downloadFile = fn() => Storage::disk('public')->download($this->episode->file_path);

?>

<div class="flex flex-col gap-4 w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-6">
    <p class="font-extralight text-gray-400 text-sm">Feb 24 2022</p>
    <h1 class="text-lg font-semibold">
        {{$episode->title}}
    </h1>
    <audio controls src="{{ Storage::disk('public')->url($episode->file_path) }}"></audio>
    <p>
        <span x-show="$wire.expanded">{{$episode->transcript}}</span>
        <span x-show="!$wire.expanded" @class(["after:content-['...']" => $this->exceedsTeaserLength])>
            {{substr($episode->transcript, 0, $transcriptTeaserLength)}}
        </span>
    </p>
    <div>
        @if($this->exceedsTeaserLength)
            <x-primary-button x-on:click="$wire.expanded = !$wire.expanded">
                <span x-show="$wire.expanded">Show Less</span>
                <span x-show="!$wire.expanded">Show More</span>
            </x-primary-button>
        @endif
        <x-secondary-button wire:click="downloadFile">
            Download
        </x-secondary-button>
    </div>
</div>
