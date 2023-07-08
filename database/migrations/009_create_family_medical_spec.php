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
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_FHALLERGY')->nullable();
            $table->string('ONE_EF_FHORGANCANCER')->nullable();
            $table->string('ONE_EF_FHHEPATYPE')->nullable();
            $table->string('ONE_EF_FHHIGH')->nullable();
            $table->integer('ONE_EF_FHHIGHESTSYSTOLIC')->nullable();
            $table->integer('ONE_EF_FHHIGHESTDIASTOLIC')->nullable();
            $table->string('ONE_EF_FHPULTUB')->nullable();
            $table->string('ONE_EF_FHEXPULTUB')->nullable();
            $table->string('ONE_EF_FHOTHERS')->nullable();
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
