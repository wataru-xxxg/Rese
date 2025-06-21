<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            '寿司',
            '焼肉',
            '居酒屋',
            'イタリアン',
            'ラーメン',
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre,
            ]);
        }
    }
}
