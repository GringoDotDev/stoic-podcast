<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'file_name',
        'transcript',
    ];

    public function favoriteEpisodes(): HasMany
    {
        return $this->hasMany(FavoriteEpisode::class, 'episode_id');
    }
}
