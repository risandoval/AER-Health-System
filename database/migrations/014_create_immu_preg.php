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
        Schema::create('immu_preg', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_IP_IMMPREG')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immu_preg');
    }
};
