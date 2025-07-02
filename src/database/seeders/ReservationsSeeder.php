<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2025-01-01',
            'time' => '18:00',
            'number' => 2,
        ];
        DB::table('reservations')->insert($param);
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2025-02-01',
            'time' => '18:00',
            'number' => 2,
        ];
        DB::table('reservations')->insert($param);
    }
}
