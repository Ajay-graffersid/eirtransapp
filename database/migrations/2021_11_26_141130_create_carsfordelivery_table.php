<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsfordeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carsfordelivery', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned();
            $table->bigInteger('loadcontener_id')->unsigned();
            $table->string('delivery')->nullable();
            $table->string('carrier')->nullable();
            $table->string('route')->nullable();
            $table->string('registration')->nullable();
            $table->string('dateoftravel')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->string('lenght')->nullable();
            $table->string('drivername')->nullable();
            $table->string('contents')->nullable();
            $table->string('shippingref')->nullable();
            $table->string('customer')->nullable();
            $table->string('date')->nullable();
            $table->string('cusref')->nullable();
            $table->string('mrn_number')->nullable();
            $table->string('pbn_number')->nullable();
            $table->string('imo')->nullable();
            $table->string('eta')->nullable();

            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('loadcontener_id')->references('id')->on('loadconteners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carsfordelivery');
    }
}
