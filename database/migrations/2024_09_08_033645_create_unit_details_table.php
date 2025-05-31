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
        Schema::create('unit_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deno_id');
            $table->unsignedBigInteger('user_id');
            $table->string('chassis');
            $table->string('motor_no');
            $table->string('plate_no');
            $table->string('case_no');
            $table->timestamps();

            $table->foreign('deno_id')->references('id')->on('denominations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_details');
    }
};
