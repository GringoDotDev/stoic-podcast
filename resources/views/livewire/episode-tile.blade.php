<?php

use function Livewire\Volt\{on, state, computed};
use App\Models\FavoriteEpisode;

state('episode')->reactive();
$query = computed(fn() => FavoriteEpisode::where([
    'user_id' => auth()->id(),
    'episode_id' => $this->episode->id,
]));
$favoriteEpisode = computed(fn() => $this->query->first());
$isFavorited = computed(fn() => $this->query->exists());

$downloadFile = fn() => Storage::disk('public')->download($this->episode->file_path);

$addFavorite = function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (!auth()->user()?->can('create', FavoriteEpisode::class)) {
        abort(403);
    }

    $favorite = FavoriteEpisode::firstOrCreate([
        'user_id' => auth()->id(),
        'episode_id' => $this->episode->id,
    ]);

    $this->dispatch('favorite-added', id: $favorite->id);
};

$removeFavorite = function () {
    if (!auth()->user()?->can('delete', $this->favoriteEpisode)) {
        abort(403);
    }

    $favorite = $this->query->delete();
    unset($this->favoriteEpisode);
    $this->dispatch('favorite-removed');
};

?>


<div class="flex flex-col gap-4 w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-6"
     x-data="{expanded: false}">
    <p class="font-extralight text-gray-400 text-sm">{{ $episode->updated_at->toFormattedDateString() }}</p>
    <div class="flex gap-4">
        <h1 class="text-lg font-semibold flex-grow">
            {{$episode->title}}
        </h1>
        <div class="flex-shrink" wire:click="{{ $this->isFavorited ? 'removeFavorite' : 'addFavorite' }}">
            <x-lucide-heart
                wire:loading.class="fill-red-500"
                wire:target="addFavorite"
                @class(["w-6", "h-6", "stroke-red-500", "cursor-pointer", "hidden" => $this->isFavorited]) />
            <x-lucide-heart
                wire:loading.class.remove="fill-red-500"
                wire:target="removeFavorite"
                @class(["w-6", "h-6", "stroke-red-500", "fill-red-500", "cursor-pointer", "hidden" => !$this->isFavorited]) />
        </div>
    </div>
    <audio controls src="{{ Storage::disk('public')->url($episode->file_path) }}"></audio>
    <p class="truncate" :class="{ 'truncate': !expanded }">
        <span>{{$episode->transcript}}</span>
    </p>
    <div>
        <x-primary-button @click="expanded = !expanded">
            <span x-text="expanded ? 'Show Less' : 'Show More'">Show More</span>
        </x-primary-button>
        <x-secondary-button wire:click="downloadFile">
            Download
        </x-secondary-button>
    </div>
</div>
