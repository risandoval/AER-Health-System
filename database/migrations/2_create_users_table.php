<?php

use App\Models\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('role');
            $table->string('position')->nullable(); //admin
            $table->string('specialization')->nullable(); //doctor
            $table->string('barangay')->nullable(); //BHW
            $table->date('birthday');
            $table->bigInteger('contact');
            $table->string('email')->unique();
            
            $table->string('password')->default(bcrypt('password'));
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
