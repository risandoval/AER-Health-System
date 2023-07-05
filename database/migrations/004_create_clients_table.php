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
        Schema::create('one_ef_client', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ONE_EF_HSAD');
            $table->string('ONE_EF_PIN');
            $table->string('ONE_EF_ATC');
            $table->string('ONE_EF_LASTNAME');
            $table->string('ONE_EF_FIRSTNAME');
            $table->string('ONE_EF_MIDDLENAME')->nullable();
            $table->string('ONE_EF_EXTENSIONNAME')->nullable();
            $table->date('ONE_EF_BDAY');
            $table->string('ONE_EF_SEX');
            $table->string('ONE_EF_BRGY');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('one_ef_client');
    }
};
