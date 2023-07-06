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
        Schema::create('preg_history', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedBigInteger('one_ef_client_id');
            $table->integer('one_ef_client_id')->unsigned();
            $table->foreign('one_ef_client_id')->references('id')->on('one_ef_client')->onDelete('cascade');
            $table->integer('ONE_EF_LIVCHILD');
            $table->integer('ONE_EF_ABORT');
            $table->integer('ONE_EF_PREMATURE');
            $table->integer('ONE_EF_FULLTERM');
            $table->string('ONE_EF_DELIVERYTYPE');
            $table->integer('ONE_EF_PARI');
            $table->integer('ONE_EF_GRAV');
            $table->string('ONE_EF_ECLAMPSIA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preg_history');
    }
};
