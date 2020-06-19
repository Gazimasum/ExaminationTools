<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('phone_no')->unique();
          $table->unsignedInteger('country_id')->comment('Country table id');
          $table->string('city');
          $table->unsignedInteger('education_level');
          $table->string('subjects');
          $table->string('password');
          $table->timestamp('email_verified_at')->nullable();
          $table->string('ip_address')->nullable();
          $table->string('avater')->nullable();
          $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active|2=Ban');
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('education_level')
          ->references('id')->on('education_levels')
          ->onDelete('cascade');

          // $table->foreign('subject')
          // ->references('id')->on('subjects')
          // ->onDelete('cascade');

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
        Schema::dropIfExists('freelancers');
    }
}
