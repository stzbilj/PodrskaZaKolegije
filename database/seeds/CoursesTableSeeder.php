<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $courseId = DB::table('courses')->insertGetId(
            array(
                'name' => 'Računarski praktikum 1'
            )
        );

        $userId = DB::table('users')->where('role', 0)->pluck('id')->first();
        DB::table('admin_course')->insert(
            array(
                'course_id' => $courseId,
                'user_id' => $userId,
            )
        );

        $programmsId = DB::table('programms')->where('name', 'Matematika')->pluck('id')->first();
        DB::table('course_programm')->insert(
            array(
                'course_id' => $courseId,
                'programm_id' => $programmsId,
            )
        );

        $courseId = DB::table('courses')->insertGetId(
            array(
                'name' => 'Računarski praktikum 2',
            )
        );

        DB::table('admin_course')->insert(
            array(
                'course_id' => $courseId,
                'user_id' => $userId,
            )
        );
        
        $programmsId = DB::table('programms')->where('name', 'Računarstvo i matematika')->pluck('id')->first();
        DB::table('course_programm')->insert(
            array(
                'course_id' => $courseId,
                'programm_id' => $programmsId,
            )
        );




    }
}
