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
                'governorate_id' => 1,
                'name' => [
                    'en' => 'Kafr el-Sheikh Governorate',
                    'ar' => 'كفر الشيخ ',
                ],
            ],

            [
                'governorate_id' => 1,
                'name' => [
                    'en' => 'Desooq',
                    'ar' => 'دسوق',
                ],
            ],
            [
                'governorate_id' => 1,
                'name' => [
                    'en' => 'Sede Salem',
                    'ar' => 'سيدي سالم',
                ],
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'en' => 'Cairo City',
                    'ar' => 'مدينة القاهرة ',
                ],
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'en' => 'Helwan City',
                    'ar' => 'مدينة حلوان ',
                ],
            ],
            [
                'governorate_id' => 2,
                'name' => [
                    'en' => 'Banha City',
                    'ar' => 'مدينة بنها ',
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
