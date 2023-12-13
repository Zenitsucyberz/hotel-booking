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
        Schema::create('hotel_rooms_aminities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_room_id')->nullable();
            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms');
            $table->unsignedBigInteger('hotel_aminities_id')->nullable();
            $table->foreign('hotel_aminities_id')->references('id')->on('hotel_aminities');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms_aminities');
    }
};
