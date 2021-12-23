<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMorningtruckacceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morningtruckaccepts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('truck_id')->nullable()->unsigned();
            $table->string('trucknumber')->nullable();
            $table->string('general')->nullable();
            $table->string('trailerid')->nullable();
            $table->string('mileage')->nullable();
            $table->string('selectitem')->nullable();       
            $table->string('nil')->nullable();       
            $table->string('datetime')->nullable();       
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade'); 
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('morningtruckaccepts');
    }
}
