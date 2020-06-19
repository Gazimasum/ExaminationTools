<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssingmentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assingment_images', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('assingment_id')->unsigned()->index();;;
          $table->string('image');
          $table->foreign('assingment_id')
          ->references('id')->on('assingments')
          ->onDelete('cascade');
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
        Schema::dropIfExists('assingment_images');
    }
}
