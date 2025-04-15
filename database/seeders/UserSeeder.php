<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminRoleId = DB::table('roles')->where('title', 'SuperAdmin')->first()->id;
        $adminRoleId = DB::table('roles')->where('title', 'Admin')->first()->id;
        $userRoleId = DB::table('roles')->where('title', 'User')->first()->id;
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'role_id' => $superadminRoleId,
                'email' => 'superadmin@example.com',
                'phone' => '1111111111',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Change this to a more secure password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'role_id' => $adminRoleId,
                'email' => 'admin@example.com',
                'phone' => '2222222222',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Change this to a more secure password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'role_id' => $userRoleId,
                'email' => 'user@example.com',
                'phone' => '3333333333',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Change this to a more secure password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
