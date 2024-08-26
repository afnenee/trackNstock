<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use Illuminate\Cache\RateLimiting\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;


class RouteServiceProvider extends ServiceProvider
{
  /**
   * The path to the "home" route for your application.
   *
   * This is used by the authentication controllers to redirect users after login.
   *
   * @var string
   */
  public const HOME = '/home';

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Define your route model bindings, pattern filters, and other route configurations.
   *
   * @return void
   */
  public function boot()
  {
    $this->configureRateLimiting();

    $this->routes(function () {
      Route::middleware('web')
        ->group(base_path('routes/web.php'));

      Route::middleware('api')
        ->prefix('api')
        ->group(base_path('routes/api.php'));

      // Add this route group inside the routes function
      Route::middleware(['auth', 'verified'])
        ->group(function () {
          Route::get('/dashboard/Analytics', [Analytics::class, 'index'])->name('dashboard');
        });
    });
  }

  /**
   * Configure the rate limiters for the application.
   *
   * @return void
   */
  // protected function configureRateLimiting()
  // {
  //   RateLimiter::for('api', function (Request $request) {
  //     return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
  //   });
  // }
}
