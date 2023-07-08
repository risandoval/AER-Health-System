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
        Schema::create('pfps_oth', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_HEENTOTH')->nullable();
            $table->string('ONE_PC_CBLOTH')->nullable();
            $table->string('ONE_PH_HEARTOTH')->nullable();
            $table->string('ONE_PA_ABDOMENOTH')->nullable();
            $table->string('ONE_PG_GENITOTH')->nullable();
            $table->string('ONE_PD_RECTALOTH')->nullable();
            $table->string('ONE_PS_SKINOTH')->nullable();
            $table->string('ONE_PN_NEUROOTH')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pfps_oth');
    }
};
