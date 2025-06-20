<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('cities')->truncate();

        $cities = [
            [
                'governorate_id' => 27,
                'name' => [
                    'en' => 'Riyadh City',
                    'ar' => 'مدينة الرياض',
                ],
            ],
            [
                'governorate_id' => 27,
                'name' => [
                    'en' => 'El Delem City',
                    'ar' => 'مدينة الدلم',
                ],
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
