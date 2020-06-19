<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email')->uniqie();
          $table->string('password');
          $table->string('phone_no')->nullable();
          $table->rememberToken();
          $table->string('avater')->nullable();
          $table->string('type')->default('super Admin')->comment('Admin | Super Admin');
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
        Schema::dropIfExists('admins');
    }
}
