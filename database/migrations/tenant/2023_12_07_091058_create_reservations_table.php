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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
           
            $table->morphs('reservable'); // Reservable_type and Reservable_id
            $table->string('invoice_no')->unique();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('hotel_room_id')->nullable();
            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms');
            
            $table->integer('guest_count');
            $table->decimal('total_amount', 10, 2);
            $table->string('discount_type', 50);
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('taxable_amount', 10, 2);
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->decimal('sgst_amount', 10, 2)->nullable();
            $table->decimal('cgst_amount', 10, 2)->nullable();
            $table->decimal('igst_amount', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->decimal('round_off_amount', 10, 2)->nullable();
            $table->decimal('net_total_amount', 10, 2);
            $table->string('reservation_status', 20);
            $table->string('payment_status', 20);
            $table->string('payment_method', 50);
            $table->date('booking_date');
            $table->dateTime('check_in_time');
            $table->dateTime('check_out_time');
            $table->boolean('is_confirmed');
            $table->text('customer_notes')->nullable();
            $table->text('staff_notes')->nullable();
            $table->text('additional_notes')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
