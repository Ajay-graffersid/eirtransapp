<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglejobdeliveredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singlejobdelivereds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->nullable()->unsigned();
            $table->bigInteger('loadcontener_id')->nullable()->unsigned();
            $table->bigInteger('job_id')->nullable()->unsigned();
            // $table->bigInteger('user_id')->nullable()->unsigned();
            $table->string('date_time')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('cus_signature')->nullable();
            $table->string('reason')->nullable();
            $table->string('status')->nullable();
            $table->string('selecttool')->nullable();
            $table->string('carkey')->nullable();
            $table->string('job_status')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade'); 
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('singlejobdelivereds');
    }
}
