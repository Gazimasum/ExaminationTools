<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_track_id');
            $table->bigInteger('assingments_id')->unsigned()->index();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Unseen|1=Seen|2=Running|3=Complete');
            $table->unsignedTinyInteger('deal_std')->default(0)->comment('0=Not Done|1=Done');
            $table->unsignedTinyInteger('deal_wrt')->default(0)->comment('0=Not Done|1=Done');
            $table->timestamps();

            $table->foreign('assingments_id')
            ->references('id')->on('assingments')
            ->onDelete('cascade');

            $table->foreign('student_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('orders');
    }
}
