<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => ['ar' => 'العلامة المسجلة 1', 'en' => 'Brand 1'], 'slug' => ['ar' => slug('العلامة المسجلة 1'), 'en' => slug('Brand 1')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 2', 'en' => 'Brand 2'], 'slug' => ['ar' => slug('العلامة المسجلة 2'), 'en' => slug('Brand 2')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 3', 'en' => 'Brand 3'], 'slug' => ['ar' => slug('العلامة المسجلة 3'), 'en' => slug('Brand 3')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 4', 'en' => 'Brand 4'], 'slug' => ['ar' => slug('العلامة المسجلة 4'), 'en' => slug('Brand 4')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 5', 'en' => 'Brand 5'], 'slug' => ['ar' => slug('العلامة المسجلة 5'), 'en' => slug('Brand 5')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 6', 'en' => 'Brand 6'], 'slug' => ['ar' => slug('العلامة المسجلة 6'), 'en' => slug('Brand 6')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 7', 'en' => 'Brand 7'], 'slug' => ['ar' => slug('العلامة المسجلة 7'), 'en' => slug('Brand 7')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 8', 'en' => 'Brand 8'], 'slug' => ['ar' => slug('العلامة المسجلة 8'), 'en' => slug('Brand 8')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 9', 'en' => 'Brand 9'], 'slug' => ['ar' => slug('العلامة المسجلة 9'), 'en' => slug('Brand 9')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 10', 'en' => 'Brand 10'], 'slug' => ['ar' => slug('العلامة المسجلة 10'), 'en' => slug('Brand 10')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 11', 'en' => 'Brand 11'], 'slug' => ['ar' => slug('العلامة المسجلة 11'), 'en' => slug('Brand 11')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 12', 'en' => 'Brand 12'], 'slug' => ['ar' => slug('العلامة المسجلة 12'), 'en' => slug('Brand 12')], 'logo' => 'brand.webp', 'status' => 1],
            ['name' => ['ar' => 'العلامة المسجلة 13', 'en' => 'Brand 13'], 'slug' => ['ar' => slug('العلامة المسجلة 13'), 'en' => slug('Brand 13')], 'logo' => 'brand.webp', 'status' => 1],
        ];

        foreach ($data as $item) {
            Brand::create($item);
        }
    }
}
