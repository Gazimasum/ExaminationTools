<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_files', function (Blueprint $table) {
             $table->bigIncrements('id');
          $table->bigInteger('complete_id')->unsigned()->index();
          $table->string('file');
          $table->timestamps();
          $table->foreign('complete_id')
          ->references('id')->on('complete_assingments')
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
        Schema::dropIfExists('complete_files');
    }
}
