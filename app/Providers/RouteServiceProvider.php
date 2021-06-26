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
        $this->mapGeneralRoutes('routes/General');
        $this->mapMainRoutes('routes/Main');
        $this->mapApiRoutes('routes');
        $this->mapWebRoutes('routes');
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
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/UserActivity/user_activity.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/UserConnections/user_connections.php'));
    }
    public function mapLanguagesRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/languages.php'));
    }
    public function mapRegionsRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Regions/regions.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTranslation/region_translation.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTypes/region_types.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RegionTypeTranslation/region_type_translation.php'));
    }
    public function mapGeneralRoutes($path){
        $this->mapUsersRoutes($path.'/Users');
        $this->mapLanguagesRoutes($path.'/Languages');
        $this->mapRegionsRoutes($path.'/Regions');
    }


    public function mapCategoriesRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Categories/categories.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/CategoryPhotos/category_photos.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/CategoryTranslation/category_translation.php'));
    }
    public function mapIngredientsRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Ingredients/ingredients.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/IngredientTranslation/ingredient_translation.php'));
    }
    public function mapOrdersRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Orders/orders.php'));
    }
    public function mapProductsRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Products/products.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ProductTranslation/product_translation.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ProductPhotos/product_photos.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ProductOrder/product_order.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ProductIngredient/product_ingredient.php'));
    }
    public function mapRestaurantsRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Restaurants/restaurants.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/RestaurantPhotos/restaurant_photos.php'));
    }
    public function mapServicesRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/Services/services.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ServiceTranslation/service_translation.php'));
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/ServiceOrder/service_order.php'));
    }
    public function mapMainRoutes($path){
        $this->mapCategoriesRoutes($path.'/Categories');
        $this->mapIngredientsRoutes($path.'/Ingredients');
        $this->mapOrdersRoutes($path.'/Orders');
        $this->mapProductsRoutes($path.'/Products');
        $this->mapRestaurantsRoutes($path.'/Restaurants');
        $this->mapServicesRoutes($path.'/Services');
    }


    public function mapApiRoutes($path){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path($path.'/api.php'));
    }
    public function mapWebRoutes($path){
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path($path.'/web.php'));
    }
}
