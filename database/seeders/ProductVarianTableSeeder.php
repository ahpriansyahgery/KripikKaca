<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVarians;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductVarianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada produk sebelum menambahkan varian
      
        $productvariants = [
            [
                'product_id' => 1,
                'weight'        => 1,
                'price_weight'  => 10000

            ],
            [
                'product_id' => 1,
                'weight'        => 500,
                'price_weight'  => 5000

            ],
            [
                'product_id' => 1,
                'weight'        => 2,
                'price_weight'  => 20000

            ],
            [
                'product_id' => 2,
                'weight'        => 1,
                'price_weight'  => 10000

            ],
            [
                'product_id' => 2,
                'weight'        => 500,
                'price_weight'  => 5000

            ],
            [
                'product_id' => 2,
                'weight'        => 2,
                'price_weight'  => 20000

            ],
            ];
            
            foreach ($productvariants as $key => $productvariant) {
                ProductVarians::create($productvariant); 
            }
    }
}
