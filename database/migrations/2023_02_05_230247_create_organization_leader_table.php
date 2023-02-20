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
        Schema::create('organization_leader', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('organization_id');
              $table->tinyInteger('is_leader')->default('0');

     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
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
        Schema::dropIfExists('organization_leader');
    }
};
