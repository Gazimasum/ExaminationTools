<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
        $table->bigIncrements('id');
      
         $table->bigInteger('user_id')->unsigned()->index();
         $table->bigInteger('writer_id')->unsigned()->index();
         $table->bigInteger('admin_id')->unsigned()->index();
         $table->text('message');
         $table->bigInteger('is_send_by');
         $table->bigInteger('is_seen')->default(0);
         $table->bigInteger('is_user_seen')->default(0);

         $table->timestamps();

         $table->foreign('user_id')
         ->references('id')->on('users')
         ->onDelete('cascade');

         $table->foreign('writer_id')
         ->references('id')->on('freelancers')
         ->onDelete('cascade');

         $table->foreign('admin_id')
         ->references('id')->on('admins')
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
        Schema::dropIfExists('chats');
    }
}
