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
            $table->string('title')->nullable();
            $table->string('designation')->nullable();
            $table->string('bio')->nullable();
            $table->string('cv')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
