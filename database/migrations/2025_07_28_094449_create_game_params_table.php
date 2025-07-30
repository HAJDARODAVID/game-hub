<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games_params', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id')->unsigned();
            $table->string('p_type')->nullable();
            $table->string('p_value')->nullable();

            $table->foreign('game_id')->references('id')->on('games')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_params');
    }
};
