<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinaltruckScreenshotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finaltruck_screenshots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('loadcontener_id')->nullable()->unsigned();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->string('screenshot')->nullable();
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
        Schema::dropIfExists('finaltruck_screenshots');
    }
}
