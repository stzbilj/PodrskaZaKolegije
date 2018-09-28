<?php

use Illuminate\Database\Seeder;

class ExamTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exam_types')->insert(
            array(
                array( 
                    'name' => 'Prvi kolokvij'
                ),
                array( 
                    'name' => 'Drugi kolokvij'
                ),
                array( 
                    'name' => 'Završni kolokvij'
                ),
                array( 
                    'name' => 'Popravni kolokvij'
                )
            )
        );
        $examIds[0] = DB::table('exam_types')->where('name', 'Prvi kolokvij')->pluck('id')->first();
        $examIds[1] = DB::table('exam_types')->where('name', 'Drugi kolokvij')->pluck('id')->first();

        $courseIds = DB::table('courses')->pluck('id')->all();

        foreach ($courseIds as $value) {
            foreach ($examIds as $value2) {
                DB::table('course_exams')->insert(
                    array(
                        'course_id' => $value,
                        'type_id' => $value2
                    )
                );
            }
        }
    }
}
