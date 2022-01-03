<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobdeliveredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdelivereds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('loadcontener_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();
            $table->string('date_time')->nullable();
            $table->string('email')->nullable();
            $table->string('cus_signature')->nullable();

            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade'); 
            $table->foreign('loadcontener_id')->references('id')->on('loadconteners')->onDelete('cascade'); 
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobdelivereds');
    }
}
