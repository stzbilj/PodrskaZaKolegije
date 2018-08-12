<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            array(
                'name' => 'Marko',
                'surname'=> 'Horvat',
                'email' => 'marko.horvat@mail.com',
                'role' => 0,
                'password' => Hash::make('markovasifra'),
            )
        );
        
        $id = DB::table('users')->insertGetId(
            array(
                'name' => 'Ivan',
                'surname'=> 'Marić',
                'email' => 'ivan.maric@mail.com',
                'role' => 1,
                'password' => Hash::make('ivanovasifra'),
            )
        );
        
        DB::table('students_infos')->insert(
            array(
                'user_id' => $id,
                'JMBAG' => '0123456789'
            )
        );
    }
}
