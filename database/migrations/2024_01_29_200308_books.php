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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('books_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('lodging_id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email');
            $table->string('phone_num');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('address');
            $table->string('room_type');
            $table->integer('room_count');
            $table->integer('adult_count');
            $table->integer('child_count');
            $table->longText('concerns');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('room_id')->references('room_id')->on('rooms');
            $table->foreign('lodging_id')->references('lodging_id')->on('lodgings')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
