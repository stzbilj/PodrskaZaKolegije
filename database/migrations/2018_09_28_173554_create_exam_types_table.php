<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });

        Schema::create('course_exams', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->primary(['course_id', 'type_id']);
        });

        Schema::table('course_exams', function($table) {
            $table->foreign('type_id')->references('id')->on('exam_types')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_exams');
        Schema::dropIfExists('exam_types');
    }
}
