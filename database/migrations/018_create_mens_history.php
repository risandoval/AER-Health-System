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
        Schema::create('mens_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_MENARCHE')->nullable();
            $table->integer('ONE_EF_MENARCHEAGE')->nullable();
            $table->integer('ONE_EF_ONSETSEX')->nullable();
            $table->string('ONE_EF_MENOP')->nullable();
            $table->integer('ONE_EF_MENOPAGE')->nullable();
            $table->integer('ONE_EF_MENSDAYS')->nullable();
            $table->integer('ONE_EF_PADS')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mens_history');
    }
};
