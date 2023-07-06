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
        Schema::create('past_medical_spec', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_EF_ALLERGY')->nullable();
            $table->string('ONE_EF_ORGANCANCER')->nullable();
            $table->string('ONE_EF_HEPATYPE')->nullable();
            $table->integer('ONE_EF_HIGHESTSYSTOLIC')->nullable();
            $table->integer('ONE_EF_HIGHESTDIASTOLIC')->nullable();
            $table->string('ONE_EF_PULTUB')->nullable();
            $table->string('ONE_EF_EXPULTUB')->nullable();
            $table->string('ONE_EF_PMHOTHERS')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_medical_spec');
    }
};
