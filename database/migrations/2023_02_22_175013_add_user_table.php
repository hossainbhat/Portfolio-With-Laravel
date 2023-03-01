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
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation')->nullable();
            $table->longText('description')->nullable();
            $table->string('address')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('age')->nullable();
            $table->string('skype')->nullable();
            $table->string('freelance')->nullable();
            $table->string('nationality')->nullable();
            $table->string('image')->nullable();
            $table->string('upload_cv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
