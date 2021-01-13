<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'id' => 1,
                'name' => 'Selections'
            ],
            [
                'id' => 2,
                'name' => 'Seasons'
            ],
            [
                'id' => 3,
                'name' => 'Holidays'
            ],
            [
                'id' => 4,
                'name' => 'World Foods'
            ],
            [
                'id' => 5,
                'name' => 'Diets'
            ],


        ];

        \App\Category::insert($categories);
    }
}
