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
        Schema::create('ncd_hra', function (Blueprint $table) {
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->string('ONE_EF_FATFOOD')->nullable();
            $table->string('ONE_EF_VEG')->nullable();
            $table->string('ONE_EF_FRUIT')->nullable();
            $table->string('ONE_EF_PHYACTIV')->nullable();
            $table->string('ONE_EF_DIABETES')->nullable();
            $table->string('ONE_EF_DIABETESYES')->nullable();
            $table->string('ONE_EF_SYMPTOMS')->nullable();
            $table->string('ONE_EF_RBG')->nullable();
            $table->string('ONE_EF_FBSRBS')->nullable();
            $table->integer('ONE_EF_RBGL')->nullable();
            $table->date('ONE_EF_RBGDATE')->nullable();
            $table->string('ONE_EF_RBL')->nullable();
            $table->date('ONE_EF_RBLDATE')->nullable();
            $table->integer('ONE_EF_CHOLESTEROL')->nullable();
            $table->string('ONE_EF_KETONESPRES')->nullable();
            $table->integer('ONE_EF_KETONES')->nullable();
            $table->date('ONE_EF_KETONESDATE')->nullable();
            $table->string('ONE_EF_PROTEINPRES')->nullable();
            $table->integer('ONE_EF_PROTEIN')->nullable();
            $table->date('ONE_EF_PROTEINDATE')->nullable();
            $table->string('ONE_EF_AHA')->nullable();
            $table->string('ONE_EF_CHESTPAIN')->nullable();
            $table->string('ONE_EF_CENTERPAIN')->nullable();
            $table->string('ONE_EF_UPHILL')->nullable();
            $table->string('ONE_EF_WALKING')->nullable();
            $table->string('ONE_EF_TONGUE')->nullable();
            $table->string('ONE_EF_10M')->nullable();
            $table->string('ONE_EF_CHESTFRONT')->nullable();
            $table->string('ONE_EF_SATIA')->nullable();
            $table->string('ONE_EF_DIFF')->nullable();
            $table->string('ONE_EF_RISK')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ncd_hra');
    }
};
