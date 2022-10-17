<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('store_id');
            $table->string('phone')->nullable();
            $table->string('open(day/h:m)')->nullable();
            $table->string('close(day/h:m)')->nullable();
            $table->integer('order_capacity')->nullable();
            $table->boolean('is_24h')->default('1');
            $table->boolean('is_7days')->default('1');
            $table->boolean('is_closed')->default('1');
            $table->boolean('delivery_cost')->nullable();
            $table->boolean('vat_precentage')->nullable();
            $table->boolean('minimum_order_amount')->nullable();
            $table->boolean('total_rating')->nullable();

            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');
                $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');
                $table->foreign('district_id')->references('id')
                ->on('districts')->onDelete('cascade');
                $table->foreign('store_id')->references('id')
                ->on('stores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_stores');
    }
};
