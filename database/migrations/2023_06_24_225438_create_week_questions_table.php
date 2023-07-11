<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('week_id');
            $table->unsignedInteger('question_id');
            $table->timestamps();

            $table->foreign('week_id')
                  ->references('id')
                  ->on('weeks')
                  ->onUpdate('cascade');
            $table->foreign('question_id')
                  ->references('id')
                  ->on('questions')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_questions');
    }
}
