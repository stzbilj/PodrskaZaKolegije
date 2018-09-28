<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_views', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->smallInteger('type');
            $table->mediumText('view');
            $table->timestamps();
            $table->primary(['course_id', 'type']);
        });
        
        Schema::table('course_views', function($table) {
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
        Schema::dropIfExists('course_views');
    }
}
