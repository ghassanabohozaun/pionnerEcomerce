<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => [
                'ar' => 'الشروط والقيود',
                'en' => 'Tearms And Condtions',
            ],
            'slug' => [
                'ar' => slug('الشروط والقيود'),
                'en' => slug('Tearms And Condtions'),
            ],
            'details' => [
                'ar' => fake()->paragraph(20),
                'en' => fake()->paragraph(20),
            ],
            'status' => 1,
            'photo' => '',
        ]);

        Page::create([
            'title' => [
                'ar' => 'سياسة الخصوصية',
                'en' => 'Privacy Police',
            ],
            'slug' => [
                'ar' => slug('سياسة الخصوصية'),
                'en' => slug('Privacy Police'),
            ],
            'details' => [
                'ar' => fake()->paragraph(20),
                'en' => fake()->paragraph(20),
            ],
            'status' => 1,
            'photo' => '',
        ]);
    }
}
