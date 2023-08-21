<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('file_path');
            $table->string('file_name');
            $table->longText('transcript')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
