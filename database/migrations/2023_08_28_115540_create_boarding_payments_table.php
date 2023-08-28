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
        Schema::create('boarding_payments', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->double('amount');
            $table->string('payment_receipts');
            $table->string('payment_method');
            $table->enum('payment_approval', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->unsignedBigInteger('boarder_id');
            $table->unsignedBigInteger('boarding_id');
            $table->timestamps();

            $table->foreign('boarder_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('boarding_id')->references('id')->on('boarding_places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_payments');
    }
};
