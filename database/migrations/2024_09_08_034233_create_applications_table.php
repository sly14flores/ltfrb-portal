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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('app_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('deno_id');
            $table->unsignedBigInteger('type_id');
            $table->string('case_number');
            $table->string('chassis_number');
            $table->string('motor_number');
            $table->string('plate_number');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('deno_id')->references('id')->on('denominations')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
