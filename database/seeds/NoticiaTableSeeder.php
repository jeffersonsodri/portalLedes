<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
        
        DB::table('notices')->insert([
            'title' => 'Noticia',
            'description' => 'Essa é uma notícia muito bacana',
            'author' => 'Jefferson Souza Rodrigues',
            'date' => '2019-12-01',
            'image' => 'SEI.jpg',
            'updated_at' => '2019-12-01 20:20:20'
        ]);
       
       
    }
}
