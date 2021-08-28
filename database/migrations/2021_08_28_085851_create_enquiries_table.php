<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('manu_id');
            $table->foreign('manu_id')->references('id')->on('manufactures');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('car_models');
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
        Schema::dropIfExists('enquiries');
    }
}
