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
        Schema::table('game_inst_assets', function (Blueprint $table) {
            $table->string('a_value_2')->nullable();
            $table->string('a_value_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_inst_assets', function (Blueprint $table) {
            //
        });
    }
};
