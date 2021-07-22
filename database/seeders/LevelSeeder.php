<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'level' => '100'
        ]);

        DB::table('levels')->insert([
            'level' => '200'
        ]);

        DB::table('levels')->insert([
            'level' => '300'
        ]);

        DB::table('levels')->insert([
            'level' => '400'
        ]);

        DB::table('levels')->insert([
            'level' => '500'
        ]);

        DB::table('levels')->insert([
            'level' => '600'
        ]);
        
        DB::table('levels')->insert([
            'level' => '700'
        ]);
    }
}
