<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followupappointments', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('appointment_id')->nullable(); $table->unsignedBigInteger('user_id');  
            $table->dateTime('start_time');
            $table->dateTime('endTime');
               $table->string('message')->nullable();
            $table->unsignedBigInteger('ocassion_id');
              $table->string('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ocassion_id')->references('id')->on('ocassion')->onDelete('cascade');

      $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('followupappointments');
    }
};
