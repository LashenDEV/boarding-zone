<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserved_boarding_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boarder_id')->constrained('users');
            $table->foreignId('boarding_place_id')->constrained('boarding_places');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_boarding_places');
    }
};
