<?php

namespace Database\Seeders;

use Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert_data = [
            ['name' => 'Metallurgical'],
            ['name' => 'Engineering/Chemical & Allied '],
            ['name' => 'Mineral'],
            ['name' => 'Agricultural & Forest'],
            ['name' => 'Marine'],
            ['name' => 'Handloom'],
            ['name' => 'Handicraft'],
            ['name' => 'Textile'],
            ['name' => 'Pharmaceutical'],
            ['name' => 'Gems & Jewelry'],
            ['name' => 'Other Service Provider'],
        ];

        Category::insert($insert_data);
    }
}
