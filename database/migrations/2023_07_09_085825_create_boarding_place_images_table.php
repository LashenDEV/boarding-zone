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
        Schema::create('boarding_place_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('boarding_id');
            $table->timestamps();

            $table->foreign('boarding_id')->references('id')->on('boarding_places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_place_images');
    }
};
