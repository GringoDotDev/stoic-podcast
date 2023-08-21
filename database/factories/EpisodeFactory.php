<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EpisodeFactory extends Factory
{
    protected $model = Episode::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'file_path' => $this->faker->filePath(),
            'file_name' => $this->faker->word().'.mp3',
            'transcript' => $this->faker->paragraph(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
