<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned()->index();
            $table->unsignedInteger('payment_method_id');
            $table->string('transection_id');
            $table->timestamps();

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onDelete('cascade');

            $table->foreign('payment_method_id')
            ->references('id')->on('payment_methods')
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
        Schema::dropIfExists('payments');
    }
}
