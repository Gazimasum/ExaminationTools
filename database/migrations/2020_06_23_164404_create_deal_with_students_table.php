<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealWithStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_with_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('order_id')->unsigned()->index();
            $table->decimal('price',12,2)->unsigned()->nullable();
            $table->unsignedTinyInteger('is_paid')->default(0);
            $table->string('transection_id')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->foreign('order_id')
            ->references('id')->on('orders')
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
        Schema::dropIfExists('deal_with_students');
    }
}
