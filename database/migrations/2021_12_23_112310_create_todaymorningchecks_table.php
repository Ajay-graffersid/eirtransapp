<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodaymorningchecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todaymorningchecks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->string('truck_number')->nullable();
            $table->string('currenttdate')->nullable();
            $table->string('mobile')->nullable();
            $table->string('drivername')->nullable();       
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todaymorningchecks');
    }
}
