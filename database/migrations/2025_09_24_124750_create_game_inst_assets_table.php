<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_inst_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_inst')->unsigned();
            $table->string('a_name')->nullable();
            $table->json('a_value')->nullable();

            $table->foreign('game_inst')->references('id')->on('game_instances')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_inst_assets');
    }
};
