<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('year_no');
            $table->string('type');
        });

        Schema::create('course_programm', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('programm_id')->unsigned();
            $table->integer('year');
            $table->primary(['course_id', 'programm_id']);
        });
        
        Schema::table('course_programm', function($table) {
            $table->foreign('programm_id')->references('id')->on('programms')->onDelete('cascade');
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
        Schema::dropIfExists('course_programm');
        Schema::dropIfExists('programms');
    }
}
