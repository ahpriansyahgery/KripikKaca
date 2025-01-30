<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieTableSeeder extends Seeder
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
                'name' => 'Kripik Kaca'
            ],
            [
                'name' => 'Basreng'
            ]
            ];

            foreach ($categories as $key => $categorie) {
                Category::create($categorie);
            }
    }
}
