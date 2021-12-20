<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completejobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('loadcontener_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            // $table->string('date_time')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('note')->nullable();
            $table->string('selecttool')->nullable();
            $table->string('car_key')->nullable();
            $table->string('signatureimage')->nullable();
            $table->string('image_path')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('completejobs');
    }
}
