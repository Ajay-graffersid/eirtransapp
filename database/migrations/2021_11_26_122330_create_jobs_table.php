<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lane_id')->unsigned();
            $table->integer('job_number')->nullable();
            $table->string('make_model')->nullable();
            $table->string('reg')->nullable();
            $table->string('location')->nullable();
            
            $table->string('collection_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('booking_date')->nullable();           
            $table->string('vin_number')->nullable();
            $table->string('relese_code')->nullable();
            $table->string('commcode')->nullable();
            $table->string('weight')->nullable();
            $table->string('curr')->nullable();
            $table->string('eori')->nullable();
            $table->string('value')->nullable();
            $table->string('shipimo')->nullable();
            $table->string('eta')->nullable();
            $table->string('bill_of_laden')->nullable();
            $table->string('description')->nullable();
            $table->string('rate')->nullable();
            $table->string('inv_ref')->nullable();
            $table->string('inv_file')->nullable();
            $table->string('status')->default('0');
            $table->string('old_status')->nullable();
            $table->integer('split_job')->nullable();
            $table->string('model')->nullable();
            $table->string('old_lan')->nullable();
            $table->string('load_status')->nullable();
           
            $table->integer('bookingstatus')->nullable();
            $table->integer('lan_status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lane_id')->references('id')->on('lanes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
