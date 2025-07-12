<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $color_attribute = Attribute::create([
            'name' => [
                'en' => 'Color',
                'ar' => 'اللون',
            ],
        ]);

        $color_attribute->attributeValues()->createMany([
            [
                'value' => [
                    'en' => 'Red',
                    'ar' => 'الأحمر',
                ],
            ],
            [
                'value' => [
                    'en' => 'Green',
                    'ar' => 'الأخضر',
                ],
            ],
            [
                'value' => [
                    'en' => 'Blue',
                    'ar' => 'الأزرق',
                ],
            ],
            [
                'value' => [
                    'en' => 'Yellow',
                    'ar' => 'الأصفر',
                ],
            ],
            [
                'value' => [
                    'en' => 'Brown',
                    'ar' => 'البني',
                ],
            ],
        ]);

        $size_attribute = Attribute::create([
            'name' => [
                'en' => 'Size',
                'ar' => 'الحجم',
            ],
        ]);

        $size_attribute->attributeValues()->createMany([
            [
                'value' => [
                    'en' => 'X Large',
                    'ar' => 'كبير جداً',
                ],
            ],
            [
                'value' => [
                    'en' => 'Large',
                    'ar' => 'كبير',
                ],
            ],
            [
                'value' => [
                    'en' => 'Meduim',
                    'ar' => 'متوسط',
                ],
            ],
            [
                'value' => [
                    'en' => 'Small',
                    'ar' => 'صغير',
                ],
            ],
            [
                'value' => [
                    'en' => 'X Samll',
                    'ar' => 'صغير جداً',
                ],
            ],
        ]);
    }
}
