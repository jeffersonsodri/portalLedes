<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('peoples')->insert([
            'name' => "Jefferson",
            'email' => "jsodricacula@hotmail.com",
        ]);
        DB::table('peoples')->insert([
            'name' => "Jeff",
            'email' => 'jeffersoncacula@gmail.com',
        ]);

    }
}
