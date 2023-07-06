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
        Schema::create('social_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_EF_SMOKE');
            $table->string('ONE_EF_PACKS');
            $table->string('ONE_EF_ALC');
            $table->string('ONE_EF_BOT');
            $table->string('ONE_EF_DRUGS');
            $table->string('ONE_EF_SEXACTIVE');
            $table->string('ONE_EF_IMMUNO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_histories');
    }
};
