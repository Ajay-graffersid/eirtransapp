<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadcontenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loadconteners', function (Blueprint $table) {
            $table->id();
            $table->integer('loadnumber')->nullable();
            $table->string('load_title')->nullable();
            // $table->string('job_id')->nullable();
            $table->string('job_id', 32)->references('id')->on('jobs');
            $table->bigInteger('car_delivery_id')->nullable()->unsigned();
            // $table->string('car_delivery_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('type')->nullable();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->integer('load_type')->nullable();
            $table->string('track_image_status')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('load_with_jobdetails')->nullable();
            $table->string('load_date')->nullable();
            $table->string('delivery_type')->nullable();
            $table->timestamps();

            // $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            // $table->foreign('car_delivery_id')->references('id')->on('carsfordelivery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loadconteners');
    }
}
