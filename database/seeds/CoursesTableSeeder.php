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
        DB::table('course_admins')->insert(
            array(
                'course_id' => $courseId,
                'user_id' => $userId,
            )
        );

        $programmsId = DB::table('programms')->where('name', 'Matematika')->pluck('id')->first();
        DB::table('programm_courses')->insert(
            array(
                'course_id' => $courseId,
                'programm_id' => $programmsId,
                'year' => 2,
            )
        );

        $courseId = DB::table('courses')->insertGetId(
            array(
                'name' => 'Računarski praktikum 2',
            )
        );

        DB::table('course_admins')->insert(
            array(
                'course_id' => $courseId,
                'user_id' => $userId,
            )
        );
        
        $programmsId = DB::table('programms')->where('name', 'Računarstvo i matematika')->pluck('id')->first();
        DB::table('programm_courses')->insert(
            array(
                'course_id' => $courseId,
                'programm_id' => $programmsId,
                'year' => 1,
            )
        );




    }
}
