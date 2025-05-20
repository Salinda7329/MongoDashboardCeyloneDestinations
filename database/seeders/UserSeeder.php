<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin@mail.com'),
                'role' => '1',
                'status' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sub Admin',
                'email' => 'sub_admin@mail.com',
                'password' => Hash::make('sub_admin@mail.com'),
                'role' => '2',
                'status' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Test User1',
                'email' => 'testuser1@mail.com',
                'password' => Hash::make('testuser1@mail.com'),
                'role' => '3',
                'status' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
