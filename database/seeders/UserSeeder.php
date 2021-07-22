<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        User::create([
            'name' => 'Chief Admin Officer',
            'email' => 'c@c',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        // //2
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'a@a',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //3
        // User::create([
        //     'name' => 'Vice Chancellor',
        //     'email' => 'vc@vc',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //4
        // User::create([
        //     'name' => 'REGISTRAR',
        //     'email' => 'r@r',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //5
        // User::create([
        //     'name' => 'Bursar',
        //     'email' => 'b@b',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //6
        // User::create([
        //     'name' => 'Course System',
        //     'email' => 'cs@cs',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //7
        // User::create([
        //     'name' => 'Dean Student Affair',
        //     'email' => 'ds@ds',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //8
        // User::create([
        //     'name' => 'Dean',
        //     'email' => 'd@d',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //9
        // User::create([
        //     'name' => 'Head of Department',
        //     'email' => 's@s',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //10
        // User::create([
        //     'name' => 'Department Coordinator',
        //     'email' => 'dc@dc',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // //11
        // User::create([
        //     'name' => 'Staff',
        //     'email' => 'st@st',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()


        // ]);

        // //12
        // User::create([
        //     'name' => 'Student',
        //     'email' => 'stu@stu',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);



    }
}
