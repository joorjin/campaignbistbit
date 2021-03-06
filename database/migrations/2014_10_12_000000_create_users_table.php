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
            $table->string('name')->nullable();
            $table->string('national_number')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('permitted_act')->default(0);
            $table->string('social_networks')->default('0000');
            $table->timestamp('next_spin')->nullable();
            $table->string('invitation_code');
            $table->rememberToken()->nullable();
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
