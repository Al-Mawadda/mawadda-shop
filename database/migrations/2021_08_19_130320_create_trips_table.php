<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('str_lat')->nullable();
            $table->string('str_long')->nullable();
            $table->string('end_lat')->nullable();
            $table->string('end_long')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('cus_id')->nullable();
            $table->integer('image_trip_id')->nullable();
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
        Schema::dropIfExists('trips');
    }
}
