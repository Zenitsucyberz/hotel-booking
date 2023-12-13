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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_type')->default('hotel');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->text('address3')->nullable();
            $table->integer('zipcode')->nullable()->unsigned();
            $table->string('city')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('country')->nullable();
            $table->float('latitude', 8, 6)->nullable();
            $table->float('longitude', 9, 7)->nullable();
            $table->tinyInteger('ratings')->default(5);
            $table->boolean('is_active')->default(true);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
