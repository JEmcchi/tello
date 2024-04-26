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
        Schema::create('lodgings', function (Blueprint $table) {
            $table->id('lodging_id');
            $table->string('area');
            $table->bigInteger('total_rooms');
            $table->string('status');
            $table->string('location');
            $table->longText('lodging_info');
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lodgings');
    }
};
