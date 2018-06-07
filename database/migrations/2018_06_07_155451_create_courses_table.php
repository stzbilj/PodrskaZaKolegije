<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('year');            
            $table->timestamps();
        });

        DB::table('courses')->insert(
            array(
                'name' => 'RP2',
                'year' => '2'
            )
        );

        DB::table('courses')->insert(
            array(
                'name' => 'RP1',
                'year' => '1'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
