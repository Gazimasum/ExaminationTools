<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssingmentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assingment_files', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('assingment_id')->unsigned()->index();
          $table->string('file');
          $table->timestamps();
          $table->foreign('assingment_id')
          ->references('id')->on('assingments')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assingment_files');
    }
}
