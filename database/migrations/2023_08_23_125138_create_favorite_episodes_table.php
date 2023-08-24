<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('favorite_episodes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('episode_id')->constrained()->cascadeOnDelete();
            $table->index('user_id');
            $table->index('episode_id');
            $table->unique(['user_id', 'episode_id']);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorite_episodes');
    }
};
