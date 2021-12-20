<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collecteds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('loadcontener_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->string('type')->nullable();
            $table->string('reason')->nullable();
            $table->string('name')->nullable();
            $table->string('signature')->nullable();
            // $table->string('job_id')->nullable();  /////loadcontener_id
            // $table->string('driver_id')->nullable();
            $table->string('datetime')->nullable();
            $table->string('sessionpage')->nullable();
            // $table->string('user_id')->nullable();
            $table->string('jobstatus')->nullable();
            $table->string('status')->nullable();
            // $table->string('cardetails')->nullable();     ///job_id
            // $table->string('car_collection_id')->nullable(); ////job_id           
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('collecteds');
    }
}
