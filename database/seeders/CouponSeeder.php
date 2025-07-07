<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Faker\Core\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::truncate();
        Coupon::factory()->count(20)->create();
    }
}
