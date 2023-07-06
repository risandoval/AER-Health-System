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
        Schema::create('pmh_operation', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_EF_PSH');
            $table->date('ONE_EF_DPSO');
            $table->string('ONE_EF_PSO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmh_operation');
    }
};
