<?php

use Illuminate\Database\Seeder;

class ProgrammesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->insert(
            array(
                array( 
                    'name' => 'Matematika',
                    'year_no' => 3,
                    'type' => 'Preddiplomski'
                ),
                array( 
                    'name' => 'Matematika (nastavnički)',
                    'year_no' => 3,
                    'type' => 'Preddiplomski'
                ),
                array( 
                    'name' => 'Teorijska matematika',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Primijenjena matematika',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Matematička statistika',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Računarstvo i matematika',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Financijska i poslovna matematika',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Matematika (nastavnički)',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                ),
                array( 
                    'name' => 'Matematika i informatika (nastavnički)',
                    'year_no' => 2,
                    'type' => 'Diplomski'
                )
            )
        );
    }
}