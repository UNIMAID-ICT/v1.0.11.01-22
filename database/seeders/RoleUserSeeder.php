<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Chief Admin
        $roles = Role::find(1);
        $user = User::find(1);
        $user->roles()->attach($roles);

        // Admin
        // $roles = Role::find(2);
        // $user = User::find(2);
        // $user->roles()->attach($roles);

        // // Vice Chancellor
        // $roles = Role::find(3);
        // $user = User::find(3);
        // $user->roles()->attach($roles);

        // // Registrar
        // $roles = Role::find(4);
        // $user = User::find(4);
        // $user->roles()->attach($roles);

        // // Bursar
        // $roles = Role::find(5);
        // $user = User::find(5);
        // $user->roles()->attach($roles);

        // // Course System
        // $roles = Role::find(6);
        // $user = User::find(6);
        // $user->roles()->attach($roles);

        // // Dean Student Affair
        // $roles = Role::find(7);
        // $user = User::find(7);
        // $user->roles()->attach($roles);

        // // Dean
        // $roles = Role::find(8);
        // $user = User::find(8);
        // $user->roles()->attach($roles);

        // // Head of Head of Department
        // $roles = Role::find(9);
        // $user = User::find(9);
        // $user->roles()->attach($roles);

        // // Department Coordinator
        // $roles = Role::find(10);
        // $user = User::find(10);
        // $user->roles()->attach($roles);

        // // staff
        // $roles = Role::find(11);
        // $user = User::find(11);
        // $user->roles()->attach($roles);

        // // Student
        // $roles = Role::find(12);
        // $user = User::find(12);
        // $user->roles()->attach($roles);


        // User::all()->each(function($user) use ($roles){
        //      $user->roles()->attach(
        //             $roles->random(1)->pluck('id')
        //     );
        // });
    }
}
