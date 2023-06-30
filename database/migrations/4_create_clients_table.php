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
        Schema::create('1ef_client', function (Blueprint $table) {
            $table->id();
            $table->string('1EF_LASTNAME');
            $table->string('1EF_FIRSTNAME');
            $table->string('1EF_MIDDLENAME');
            $table->string('1EF_EXTENSIONNAME');
            $table->date('1EF_BDAY');
            $table->string('1EF_SEX');
            $table->string('1EF_BRGY');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('1ef_client');
    }
};
