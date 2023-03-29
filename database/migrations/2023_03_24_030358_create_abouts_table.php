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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name_depan');
            $table->string('name_belakang');
            $table->string('phone');
            $table->string('email');
            $table->timestamp('birthday');
            $table->string('profession');
            $table->string('website');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('image');
            $table->string('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
