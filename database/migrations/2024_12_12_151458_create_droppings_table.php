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
        Schema::create('droppings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->longText('vap')->nullable();
            $table->longText('gov_id')->nullable();
            $table->longText('or_cr')->nullable();
            $table->longText('surrender_of_plates')->nullable();
            $table->longText('non_apprehension')->nullable();
            $table->longText('lto_cert')->nullable();
            $table->longText('lto_auth')->nullable();
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droppings');
    }
};
