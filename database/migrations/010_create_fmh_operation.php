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
        Schema::create('fmh_operation', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_FO_FHSH');
            $table->string('ONE_FO_DFSO');
            $table->string('ONE_FO_FSO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fmh_operation');
    }
};
