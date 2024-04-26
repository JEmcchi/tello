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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->unsignedBigInteger('lodging_id');
            $table->string('room_number');
            $table->string('room_type');
            $table->string('bed');
            $table->decimal('price', 10, 2)->default(0);
            $table->string('occupants');
            $table->string('status');
            $table->string('room_size');
            $table->longText('room_info');
            $table->timestamps();

            $table->foreign('lodging_id')->references('lodging_id')->on('lodgings')->onDelete('CASCADE');
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');    
    }
};
