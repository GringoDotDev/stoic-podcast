<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Episode;
use App\Models\FavoriteEpisode;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = User::factory()->create([
            'email' => 'admin@gringo.dev',
            // default password is 'password', hash below
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        $episodes = Episode::factory()->count(10)->create();

        for ($i = 0; $i < 3; $i++) {
            FavoriteEpisode::factory()->create([
                'user_id' => $admin->id,
                'episode_id' => $episodes[$i]->id,
            ]);
        }
    }
}
