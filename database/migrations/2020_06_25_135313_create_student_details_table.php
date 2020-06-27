<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned()->index();
            $table->unsignedInteger('country_id')->nullable()->comment('Country table id');
            $table->string('city')->nullable();
            $table->string('avater')->nullable();
            $table->string('relation_between')->nullable();
            $table->string('optional_email')->nullable();
            $table->string('optional_phone')->nullable();
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('student_details');
    }
}
