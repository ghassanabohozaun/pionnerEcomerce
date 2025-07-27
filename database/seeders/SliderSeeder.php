<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::truncate();

        for ($i = 1; $i <= 4; $i++) {
            Slider::create([
                'title' => [
                    'en' => Fake()->sentence(5) . ' | ' . $i,
                    'ar' => Fake()->sentence(5) . ' | ' . $i,
                ],

                'details' => [
                    'en' => Fake()->paragraph(5) . ' | ' . $i,
                    'ar' => Fake()->paragraph(5) . ' | ' . $i,
                ],
                'url' => [
                    'en' => 'url',
                    'ar' => 'url',
                ],
                'order' => 0,
                'details_status' => false,
                'button_status' => false,
                'status' => true,
                'photo' => 'slider' . $i . '.webp',
            ]);
        }
    }
}
