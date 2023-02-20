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
                                 Schema::table('attendance', function (Blueprint $table) {
                                      $table->unsignedBigInteger('employee_id')->nullable();

      $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
