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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->integer('boarding_id')->nullable();
            $table->string('icon');
            $table->string('message');
            $table->integer('bowner_id');
            $table->enum('seenByBowner', ['Unseen', 'Seen'])->default('Unseen');
            $table->enum('seenByAdmin', ['Unseen', 'Seen'])->default('Unseen');
            $table->enum('seenBySAdmin', ['Unseen', 'Seen'])->default('Unseen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
