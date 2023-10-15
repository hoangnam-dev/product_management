<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 20 sản phẩm mẫu
        $products = [];
        for ($i = 1; $i <= 40; $i++) {
            $products[] = [
                'product_code' => $i <= 9 ? 'P00' . $i : 'P0' . $i,
                'product_name' => 'Sản phẩm ' . $i,
                'product_unit' => 'Cái',
                'product_price' => 100000 * $i,
                'category_id' => rand(1, 4),
            ];
        }

        // Lưu các sản phẩm mẫu vào cơ sở dữ liệu
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
