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
            $table->unsignedBigInteger('boarder_id');
            $table->unsignedBigInteger('boarding_place_id');
            $table->timestamps();

            $table->foreign('boarding_place_id')->references('id')->on('boarding_places')->onDelete('cascade');
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
