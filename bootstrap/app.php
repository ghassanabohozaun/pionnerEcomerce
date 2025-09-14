<?php

use App\Http\Middleware\SetLangMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        // api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        // apiPrefix:'api',
        then: function () {
            // web
            Route::middleware('web')
                // ->prefix('dashboard')
                // ->name('dashboard')
                ->group(base_path('routes/dashboard.php'));

            // api
            Route::middleware('api')->prefix('api/v1')->group(base_path('routes/api.php'));
            // admin api
            Route::middleware('api')->prefix('api/admin/v1')->group(base_path('routes/api/admin.php'));
            // user api
            Route::middleware('api')->prefix('api/user/v1')->group(base_path('routes/api/user.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // redirect if not auth
        $middleware->redirectGuestsTo(function () {
            if (request()->is('*/dashboard/*')) {
                return route('dashboard.get.login');
            } else {
                return route('website.get.login');
            }
        });

        // redirect if auth
        $middleware->redirectUsersTo(function () {
            if (Auth::guard('admin')->check()) {
                return route('dashboard.index');
            } else {
                return route('website.profile.index');
            }
        });

        $middleware->alias([
            /**** OTHER MIDDLEWARE ALIASES ****/
            'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
            //'setLanguage' => SetLangMiddleware::class,
        ]);

        $middleware->api(prepend: [SetLangMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
