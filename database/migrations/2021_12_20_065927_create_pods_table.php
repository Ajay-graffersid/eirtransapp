<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pods', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned(); 
            $table->bigInteger('job_id')->nullable()->unsigned();          
            $table->string('collection_date')->nullable();                   
            $table->string('deliver_date')->nullable();
            $table->string('poc_link')->nullable();
            $table->string('pod_link')->nullable();
            $table->string('email_client')->nullable();
            $table->string('emailed_delivery')->nullable();
            $table->string('status')->nullable();         
         
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pods');
    }
}
