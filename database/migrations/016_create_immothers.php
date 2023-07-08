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
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_IMMCHILDOTH')->nullable();
            $table->string('ONE_EF_IMMADULTOTH')->nullable();
            $table->string('ONE_EF_IMMPREGOTH')->nullable();
            $table->string('ONE_EF_IMMELDOTH')->nullable();
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
