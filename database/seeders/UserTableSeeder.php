<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        DB::table("users")->truncate();

        // $superAdmin = User::create([
        //     'name' => 'Souleymane',
        //     'email' => 'souleymane9700@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'is_admin' => true,
        //     'phone' => 766666666,
        //     'points' => 10,
        //     'payment' => 'Wave',

        // ]);

        $admin = User::create([
            'name' => 'JulinhoNdiaye',
            'email' => 'julinhondiaye097@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
            'phone' => 766657278,
            'points' => 10,
            'payment' => 'Wave',
        ]);

        $user = User::create([
            'name' => 'Julio',
            'email' => 'julio@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'phone' => 766666666,
            'points' => 10,
            'payment' => 'Wave',
        ]);

        // $superAdminRole = Roles::where('name', 'SuperAdmin')->first();
        $adminRole = Roles::where('name', 'Admin')->first();
        $userRole = Roles::where('name', 'User')->first();

        // $superAdmin ->roles()->attach($superAdminRole);
        $admin->roles()->attach($adminRole);
        $user ->roles()->attach($userRole);
    }
}
