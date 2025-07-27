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
        $data = [
            ['name' => ['en' => 'Category 1', 'ar' => 'القسم 1 '], 'slug' => ['en' => slug('Category 1'), 'ar' => slug('القسم 1 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 2', 'ar' => 'القسم 2 '], 'slug' => ['en' => slug('Category 2'), 'ar' => slug('القسم 2 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 3', 'ar' => 'القسم 3 '], 'slug' => ['en' => slug('Category 3'), 'ar' => slug('القسم 3 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 4', 'ar' => 'القسم 4 '], 'slug' => ['en' => slug('Category 4'), 'ar' => slug('القسم 4 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 5', 'ar' => 'القسم 5 '], 'slug' => ['en' => slug('Category 5'), 'ar' => slug('القسم 5 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 6', 'ar' => 'القسم 6 '], 'slug' => ['en' => slug('Category 6'), 'ar' => slug('القسم 6 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 7', 'ar' => 'القسم 7 '], 'slug' => ['en' => slug('Category 7'), 'ar' => slug('القسم 7 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 8', 'ar' => 'القسم 8 '], 'slug' => ['en' => slug('Category 8'), 'ar' => slug('القسم 8 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 9', 'ar' => 'القسم 9 '], 'slug' => ['en' => slug('Category 9'), 'ar' => slug('القسم 9 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 10', 'ar' => 'القسم 10 '], 'slug' => ['en' => slug('Category 10'), 'ar' => slug('القسم 10 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 11', 'ar' => 'القسم 11 '], 'slug' => ['en' => slug('Category 11'), 'ar' => slug('القسم 11 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 12', 'ar' => 'القسم 12 '], 'slug' => ['en' => slug('Category 12'), 'ar' => slug('القسم 12 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
            ['name' => ['en' => 'Category 13', 'ar' => 'القسم 13 '], 'slug' => ['en' => slug('Category 13'), 'ar' => slug('القسم 13 ')], 'status' => 1, 'parent' => null, 'icon' => 'category.webp'],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
