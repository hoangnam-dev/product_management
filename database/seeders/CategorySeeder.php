<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_code' => 'DM01',
                'category_name' => 'Điện thoại',
            ],
            [
                'category_code' => 'DM02',
                'category_name' => 'Laptop',
            ],
            [
                'category_code' => 'DM03',
                'category_name' => 'PC',
            ],
            [
                'category_code' => 'DM04',
                'category_name' => 'Phụ kiện',
            ],
        ];

        // Lưu các sản phẩm mẫu vào cơ sở dữ liệu
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
