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
         $table->tinyInteger('user_id')->nullable();
         $table->tinyInteger('writer_id')->nullable();
         $table->tinyInteger('admin_id')->nullable();
         $table->text('message');
         $table->text('reply')->nullable();
         $table->tinyInteger('is_send_by');
         $table->tinyInteger('is_seen')->default(1);
         $table->tinyInteger('is_user_seen')->default(1);

         $table->timestamps();

         // $table->foreign('user_id')
         // ->references('id')->on('users')
         // ->onDelete('cascade');
         //
         // $table->foreign('writer_id')
         // ->references('id')->on('freelancers')
         // ->onDelete('cascade');
         //
         // $table->foreign('admin_id')
         // ->references('id')->on('admins')
         // ->onDelete('cascade');
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
