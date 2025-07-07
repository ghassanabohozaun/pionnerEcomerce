<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('dashboard.*', function ($view) {
            // categories count
            if (!Cache::has('categories_count')) {
                Cache::remember('categories_count', now()->addMinutes(60), function () {
                    return Category::count();
                });
            }

            // brands count
            if (!Cache::has('brands_count')) {
                Cache::remember('brands_count', now()->addMinutes(60), function () {
                    return Brand::count();
                });
            }

            // admins count
            if (!Cache::has('admins_count')) {
                Cache::remember('admins_count', now()->addMinutes(60), function () {
                    return Admin::count();
                });
            }

            // coupons count
            if (!Cache::has('coupons_count')) {
                Cache::remember('coupons_count', now()->addMinutes(60), function () {
                    return Coupon::count();
                });
            }

            view()->share([
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
                'admins_count' => Cache::get('admins_count'),
                'coupons_count' => Cache::get('coupons_count'),
            ]);
        });
    }
}
