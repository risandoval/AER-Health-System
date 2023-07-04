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
        Schema::create('one_pms', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_PM_PMH');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('one_pms');
    }
};
