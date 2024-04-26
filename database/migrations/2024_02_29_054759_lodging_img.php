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
        Schema::create('lodging_img', function (Blueprint $table) {
            $table->id('img_id');
            $table->unsignedBigInteger('lodging_id');
            $table->string('Lodging_pic');
            $table->timestamps();

            $table->foreign('lodging_id')->references('lodging_id')->on('lodgings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lodging_img');
    }
};
