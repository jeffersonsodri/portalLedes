<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->insert([
            'login' => "jeff",
            'password' => bcrypt('123'),
            'people_id' => 1
        ]);

        DB::table('users')->insert([
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'people_id' => 2    
        ]);

    }
}
