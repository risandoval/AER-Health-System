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
        Schema::create('ppef', function (Blueprint $table){
            $table->id();
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->integer('ONE_EF_BPSYSTOLIC')->nullable();
            $table->integer('ONE_EF_BPDIASTOLIC')->nullable();
            $table->float('ONE_EF_WEIGHT')->nullable();
            $table->float('ONE_EF_HEIGHT')->nullable();
            $table->float('ONE_EF_BMI')->nullable();
            $table->integer('ONE_EF_RESPRATE')->nullable();
            $table->integer('ONE_EF_VAL')->nullable();
            $table->integer('ONE_EF_VAR')->nullable();
            $table->float('ONE_EF_TEMP')->nullable();
            $table->float('ONE_EF_LENGTH')->nullable();
            $table->float('ONE_EF_HCIRCUM')->nullable();
            $table->float('ONE_EF_SKINFOLD')->nullable();
            $table->float('ONE_EF_WAIST')->nullable();
            $table->float('ONE_EF_MAUACIRCUM')->nullable();
            $table->float('ONE_EF_HIP')->nullable();
            $table->float('ONE_EF_LIMBS')->nullable();
            $table->string('ONE_EF_BLOODTYPE')->nullable();
            $table->string('ONE_EF_AAA')->nullable();
            $table->string('ONE_EF_AS')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppef');
    }
};
