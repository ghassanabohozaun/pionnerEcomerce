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
            [
                'name' => [
                    'ar' => 'العلامة المسجلة 1',
                    'en' => 'Brand 1',
                ],
                'logo' => '',
                'status' => 1,
            ],

            [
                'name' => [
                    'ar' => 'العلامة المسجلة 2',
                    'en' => 'Brand 2',
                ],
                'logo' => '',
                'status' => 1,
            ],

            [
                'name' => [
                    'ar' => 'العلامة المسجلة 3',
                    'en' => 'Brand 3',
                ],
                'logo' => '',
                'status' => 1,
            ],

            [
                'name' => [
                    'ar' => 'العلامة المسجلة 4',
                    'en' => 'Brand 4',
                ],
                'logo' => '',
                'status' => 1,
            ],

            [
                'name' => [
                    'ar' => 'العلامة المسجلة 5',
                    'en' => 'Brand 5',
                ],
                'logo' => '',
                'status' => 1,
            ],
        ];

        foreach ($data as $item) {
            Brand::create($item);
        }
    }
}
