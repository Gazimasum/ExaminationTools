<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessageSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_message_sents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contact_message_id')->unsigned()->index();
          $table->string('name');
          $table->string('subject');
          $table->string('email');
          $table->string('phone')->nullable();
          $table->text('message');
          $table->unsignedTinyInteger('status')->default(0)->comment('0=unseen|1=Seen');
          $table->timestamps();

          $table->foreign('contact_message_id')
          ->references('id')->on('contact_messages')
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
        Schema::dropIfExists('contact_message_sents');
    }
}
