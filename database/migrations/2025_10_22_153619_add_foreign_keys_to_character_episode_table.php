<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('character_episode', function (Blueprint $table) {
            $table->foreign('character_id')->references('id')->on('characters')->cascadeOnDelete();
            $table->foreign('episode_id')->references('id')->on('episodes')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('character_episode', function (Blueprint $table) {
            $table->dropForeign(['character_id']);
            $table->dropForeign(['episode_id']);
        });
    }
};
