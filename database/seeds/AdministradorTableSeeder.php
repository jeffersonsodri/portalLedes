<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'permission'=> 'Adminsitrador',
            'user_id' => 1,
            'adm_id' => null,
        ]);
        DB::table('administrators')->insert([
            'permission'=> 'Adminsitrador',
            'user_id' => 2,
            'adm_id' => null,
        ]);
    }
}
