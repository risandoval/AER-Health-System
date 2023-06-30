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
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->string('specialization')->nullable(); //doctor
            $table->string('barangay')->nullable(); //BHW
            $table->date('birthday');
            $table->string('contact');
            $table->string('email')->nullable()->unique();
            $table->string('profile_picture');
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->string('password_request')->default('No');
            $table->string('first_login')->default('Yes');
            $table->string('password')->default(bcrypt('password'));
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
