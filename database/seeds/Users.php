<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Muhammad Talha',
            'email' => 'talha8018@gmail.com',
            'password' => bcrypt('smartLook'),
            'status'    => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Adil Dar',
            'email' => 'director@rnc.edu.pk',
            'password' => bcrypt('smartLook'),
            'status'    => '1'
        ]);
    }
}
