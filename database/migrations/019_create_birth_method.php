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
        Schema::create('birth_method', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('one_ef_client_id');
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client');
            $table->string('ONE_BC_BCM');
            $table->integer('ONE_BC_CYCLE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_method');
    }
};
