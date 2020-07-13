<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealWithWritersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_with_writers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('client_id')->unsigned()->index();
          $table->bigInteger('order_id')->unsigned()->index();
          $table->decimal('price',12,2)->unsigned()->nullable();
          $table->unsignedInteger('currency_id')->nullable();
          $table->unsignedTinyInteger('is_paid')->default(0);
          $table->string('transection_id')->nullable();
          $table->date('payment_date')->nullable();
          $table->string('ip_address')->nullable();
          $table->timestamps();

          $table->foreign('order_id')
          ->references('id')->on('orders')
          ->onDelete('cascade');

          $table->foreign('currency_id')
            ->references('id')->on('currencies')
            ->onDelete('cascade');

          $table->foreign('client_id')
          ->references('id')->on('freelancers')
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
        Schema::dropIfExists('deal_with_writers');
    }
}
