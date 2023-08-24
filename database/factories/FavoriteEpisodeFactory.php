<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\FavoriteEpisode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FavoriteEpisodeFactory extends Factory
{
    protected $model = FavoriteEpisode::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'episode_id' => Episode::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
