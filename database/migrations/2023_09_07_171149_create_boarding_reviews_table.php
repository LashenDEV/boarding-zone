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
        Schema::create('boarding_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->integer('rating');
            $table->string('comment');
            $table->enum('status', ['Pending', 'Published', 'Declined'])->default('Pending');
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
        Schema::dropIfExists('boarding_reviews');
    }
};
