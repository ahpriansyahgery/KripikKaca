<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'categorie_id' => 1,
                'name'         => 'Kripik Kaca Original',
                'price'       => 10000,
            ],
            [
                'categorie_id' => 1,
                'name'         => 'Kripik Kaca Pedas',
                'price'       => 10000,
            ],
            [
                'categorie_id' => 1,
                'name'         => 'Kripik Kaca Tolenjeng',
                'price'       => 10000,
            ],
            [
                'categorie_id' => 2,
                'name'         => 'Basreng Orginal',
                'price'       => 10000,
            ],
            [
                'categorie_id' => 2,
                'name'         => 'Basreng Pedas',
                'price'       => 10000,
            ],
        ];

        foreach ($products as $key => $product) {
            Product::create($product);
        }
    }
}
