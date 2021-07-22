<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Chief Admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Vice Chancellor'
        ]);

        DB::table('roles')->insert([
            'name' => 'Registrar'
        ]);

        DB::table('roles')->insert([
            'name' => 'Bursar'
        ]);

        DB::table('roles')->insert([
            'name' => 'Course System'
        ]);

        DB::table('roles')->insert([
            'name' => 'Dean Student Affair'
        ]);
        
        DB::table('roles')->insert([
            'name' => 'Dean'
        ]);

        
        DB::table('roles')->insert([
            'name' => 'Director'
        ]);

        DB::table('roles')->insert([
            'name' => 'Head of Department'
        ]);


        DB::table('roles')->insert([
            'name' => 'Department Coordinator'
        ]);

        DB::table('roles')->insert([
            'name' => 'Staff'
        ]);

        DB::table('roles')->insert([
            'name' => 'Student'
        ]);
    }
}
