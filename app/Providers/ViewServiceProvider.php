<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
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

            // users count
            if (!Cache::has('users_count')) {
                Cache::remember('users_count', now()->addMinutes(60), function () {
                    return User::count();
                });
            }

            // coupons count
            if (!Cache::has('coupons_count')) {
                Cache::remember('coupons_count', now()->addMinutes(60), function () {
                    return Coupon::count();
                });
            }

            // faqs count
            if (!Cache::has('faqs_count')) {
                Cache::remember('faqs_count', now()->addMinutes(60), function () {
                    return Faq::count();
                });
            }

            // contacts count
            if (!Cache::has('contacts_count')) {
                Cache::remember('contacts_count', now()->addMinutes(60), function () {
                    return Contact::where('is_read', 0)->count();
                });
            }

            // products count
            if (!Cache::has('products_count')) {
                Cache::remember('products_count', now()->addMinutes(60), function () {
                    return Product::count();
                });
            }

            // view share
            view()->share([
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
                'admins_count' => Cache::get('admins_count'),
                'users_count' => Cache::get('users_count'),
                'coupons_count' => Cache::get('coupons_count'),
                'faqs_count' => Cache::get('faqs_count'),
                'contacts_count' => Cache::get('contacts_count'),
                'products_count' => Cache::get('products_count'),
            ]);
        });

        // get share settings
        $settings = $this->firstOrCreateSettings();
        view()->share([
            'settings' => $settings,
        ]);
    }

    public function firstOrCreateSettings()
    {
        $settings = Setting::firstOr(function () {
            return Setting::create([
                'site_name' => [
                    'en' => 'E-Commerce',
                    'ar' => 'تجارة الكترونية',
                ],
                'address' => [
                    'en' => '',
                    'ar' => '',
                ],
                'description' => [
                    'en' => '',
                    'ar' => '',
                ],
                'keywords' => [
                    'en' => '',
                    'ar' => '',
                ],
                'phone' => '',
                'mobile' => '',
                'whatsapp' => '',
                'email' => '',
                'email_support' => '',
                'facebook' => '',
                'twitter' => '',
                'instegram' => '',
                'youtube' => '',
                'logo' => '',
                'favicon' => '',
                'promation_video_url' => '',
            ]);
        });

        return $settings;
    }
}
