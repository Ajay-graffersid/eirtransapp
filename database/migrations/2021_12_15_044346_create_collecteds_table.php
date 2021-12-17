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
            $table->string('type')->nullable();
            $table->string('reason')->nullable();
            $table->string('name')->nullable();
            $table->string('signature')->nullable();
            $table->string('job_id')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('datetime')->nullable();
            $table->string('sessionpage')->nullable();
            $table->string('user_id')->nullable();
            $table->string('jobstatus')->nullable();
            $table->string('status')->nullable();
            $table->string('cardetails')->nullable();
            $table->string('car_collection_id')->nullable();
            $table->timestamps();
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
