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
        Schema::create('family_medical_spec', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_EF_FHALLERGY');
            $table->string('ONE_EF_FHORGANCANCER');
            $table->string('ONE_EF_FHHEPATYPE');
            $table->string('ONE_EF_FHHIGH');
            $table->string('ONE_EF_FHHIGHESTSYSTOLIC');
            $table->string('ONE_EF_FHHIGHESTDIASTOLIC');
            $table->string('ONE_EF_FHPULTUB');
            $table->string('ONE_EF_FHEXPULTUB');
            $table->string('ONE_EF_FHOTHERS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_medical_spec');
    }
};
