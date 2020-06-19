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
            $table->string('order_trace_id');
            $table->bigInteger('assingments_id')->unsigned()->index();
            $table->bigInteger('client_id')->unsigned()->index();
            $table->decimal('price',12,2)->unsigned()->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Unseen|1=Seen|2=Running|3=Complete');
            $table->unsignedTinyInteger('is_paid')->default(0);
            $table->string('transection_id')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->foreign('assingments_id')
            ->references('id')->on('assingments')
            ->onDelete('cascade');

            $table->foreign('client_id')
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
