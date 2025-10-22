<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Таблица персонажей
        Schema::create('characters', function (Blueprint $table) {
            $table->id(); // character id
            $table->string('name');
            $table->string('status')->nullable();
            $table->string('species')->nullable();
            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('origin_id')->nullable(); // для будущей таблицы locations
            $table->unsignedBigInteger('location_id')->nullable(); // для будущей таблицы locations
            $table->string('image')->nullable(); // ссылка на картинку
            $table->timestamps();
        });

        // Таблица связи персонаж ↔ эпизоды
        Schema::create('character_episode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('episode_id'); // пока без внешнего ключа
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character_episode');
        Schema::dropIfExists('characters');
    }
};