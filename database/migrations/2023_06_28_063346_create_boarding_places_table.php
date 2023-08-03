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
        Schema::create('boarding_places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail');
            $table->double('price');
            $table->text('description');
            $table->integer('number_of_rooms');
            $table->string('target_audience');
            $table->integer('availability');
            $table->string('payment_method');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('features');
            $table->enum('publish_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('is_reserved', ['Yes', 'No'])->default('No');
            $table->unsignedBigInteger('bowner_id');
            $table->timestamps();

            $table->foreign('bowner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_places');
    }
};
