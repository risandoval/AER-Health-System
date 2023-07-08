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
        Schema::create('social_history', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_SMOKE')->nullable();
            $table->integer('ONE_EF_PACKS')->nullable();
            $table->string('ONE_EF_ALC')->nullable();
            $table->integer('ONE_EF_BOT')->nullable();
            $table->string('ONE_EF_DRUGS')->nullable();
            $table->string('ONE_EF_SEXACTIVE')->nullable();
            $table->string('ONE_EF_IMMUNO')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_history');
    }
};
