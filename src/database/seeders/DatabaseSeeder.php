<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            AreasTableSeeder::class,
            GenresTableSeeder::class,
            UsersTableSeeder::class,
            ShopsTableSeeder::class,
            ReservationsSeeder::class,
        ]);
    }
}
