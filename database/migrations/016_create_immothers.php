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
        Schema::create('immothers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_EF_IMMCHILDOTH');
            $table->string('ONE_EF_IMMADULTOTH');
            $table->string('ONE_EF_IMMPREGOTH');
            $table->string('ONE_EF_IMMELDOTH');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immothers');
    }
};
