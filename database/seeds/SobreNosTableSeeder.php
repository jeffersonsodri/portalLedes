<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SobreNosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'description' => "Descrição do LEDES",
            'image' => 'LEDES.jpg',
        ]);

    }
}
