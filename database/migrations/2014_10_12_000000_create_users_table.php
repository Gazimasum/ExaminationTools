<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->unsignedInteger('country_id')->comment('Country table id');
            $table->string('city');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ip_address')->nullable();
            $table->string('avater')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active|2=Ban');
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
