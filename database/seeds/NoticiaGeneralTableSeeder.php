<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiaGeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('notices_general')->insert([     
            'notice_id' => 1
        ]);
        
        DB::table('notices_general')->insert([     
            'notice_id' => 2
        ]);
        
        DB::table('notices_general')->insert([     
            'notice_id' => 3
        ]);
        
        DB::table('notices_general')->insert([     
            'notice_id' => 4
        ]);
        
        DB::table('notices_general')->insert([     
            'notice_id' => 5
        ]);
        DB::table('notices_general')->insert([     
            'notice_id' => 6
        ]);
    }
}
