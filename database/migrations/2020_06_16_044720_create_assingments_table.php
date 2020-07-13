<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssingmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assingments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned()->index();
            $table->string('assingment_name');
            $table->string('slug');
            // $table->unsignedInteger('assingment_subject_id');
            // $table->unsignedInteger('assingment_type_id');
            // $table->unsignedInteger('education_level_id');
            // $table->unsignedInteger('paper_length_id')->nullable();
            $table->date('deadline_date');
            $table->text('assingment_details');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            // $table->foreign('education_level_id')
            // ->references('id')->on('education_levels')
            // ->onDelete('cascade');

            // $table->foreign('assingment_subject_id')
            // ->references('id')->on('subjects')
            // ->onDelete('cascade');
            //
            // $table->foreign('assingment_type_id')
            // ->references('id')->on('assingment_types')
            // ->onDelete('cascade');
            //
            // $table->foreign('paper_length_id')
            // ->references('id')->on('paper_lengths')
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
        Schema::dropIfExists('assingments');
    }
}
