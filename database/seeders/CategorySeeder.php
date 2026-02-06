<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tanpa Kategori'],
            ['name' => 'Sejarah'],
            ['name' => 'Seni'],
            ['name' => 'Teknologi'],
            ['name' => 'Arkeologi'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}