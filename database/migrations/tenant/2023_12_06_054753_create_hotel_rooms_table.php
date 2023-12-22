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
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_label')->nullable();
            $table->string('room_count')->nullable();
            $table->unsignedBigInteger('hotel_room_category_id')->nullable();
            $table->foreign('hotel_room_category_id')->references('id')->on('hotel_room_categories');
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('maximum_guests')->nullable();
            $table->tinyInteger('beds')->nullable();
            $table->bigInteger('rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
