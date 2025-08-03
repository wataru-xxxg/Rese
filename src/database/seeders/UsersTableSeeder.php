<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'test',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2,
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'owner',
            'email' => 'owner@owner.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
        ];
        DB::table('users')->insert($param);
    }
}
