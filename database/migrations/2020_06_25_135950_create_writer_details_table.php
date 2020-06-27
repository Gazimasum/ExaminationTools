<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_details', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('writer_id')->unsigned()->index();
          $table->unsignedInteger('country_id')->comment('Country table id');
          $table->string('city')->nullable();
          $table->unsignedInteger('education_level')->nullable();
          $table->string('subjects')->nullable();
          $table->string('avater')->nullable();
          $table->string('relation_between')->nullable();
          $table->string('optional_email')->nullable();
          $table->string('optional_phone')->nullable();
          $table->string('payment_details')->nullable();
            $table->timestamps();

            $table->foreign('writer_id')
            ->references('id')->on('freelancers')
            ->onDelete('cascade');

            $table->foreign('education_level')
            ->references('id')->on('education_levels')
            ->onDelete('cascade');

            $table->foreign('country_id')
            ->references('id')->on('countries')
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
        Schema::dropIfExists('writer_details');
    }
}
