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
            $table->decimal('price');
            $table->enum('publish_status', ['Drafted', 'Approved', 'Rejected']);
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
