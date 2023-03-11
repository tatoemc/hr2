<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_type',50)->default('user');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('gender');
            $table->string('file')->nullable();
            $table->string('images')->default('default.png');
            $table->string('salary')->default('0');
            $table->text('roles_name')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->unsignedBigInteger('dept_id')->nullable();
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
