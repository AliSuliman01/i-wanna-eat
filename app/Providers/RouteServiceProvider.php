<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
     protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->configureRateLimiting();

    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    public function map()
    {
        $this->mapApiRoutes('routes');
        $this->mapGeneralRoutes('routes/General');
        $this->mapMainRoutes('routes/Main');
        $this->mapWebRoutes('routes');
    }
    public function mapApiRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/api.php'));
    }
    public function mapMainRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Restaurants/Restaurants/restaurants.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Restaurants/RestaurantPhotos/restaurant_photos.php'));
    }
    public function mapUsersRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Auth/auth.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Users/users.php'));
    }
    public function mapRegionsRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Regions/regions.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTranslations/region_translations.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTypes/region_types.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTypeTranslations/region_type_translations.php'));
    }
    public function mapGeneralRoutes($path){
        $this->mapUsersRoutes($path.'/Users');
        $this->mapLanguagesRoutes($path.'/Languages');
        $this->mapRegionsRoutes($path.'/Regions');
    }
    public function mapLanguagesRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/languages.php'));
    }
    public function mapWebRoutes($path){

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path($path.'/web.php'));
    }
}
