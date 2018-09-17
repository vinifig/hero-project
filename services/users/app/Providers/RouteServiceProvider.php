<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    /**
     * This namespace is applied to AuthorizationRoutes
     * @var string
     */
    private $authorizationNamespace = 'App\Http\Controllers\Authorization';

    /**
     * This namespace is applied to AuthorizationRoutes
     * @var string
     */
    private $authenticationNamespace = 'App\Http\Controllers\Authentication';

    /**
     * This namespace is applied to AuthorizationRoutes
     * @var string
     */
    private $userNamespace = 'App\Http\Controllers\User';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        // base route endpoints
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        // Authorization route endpoints
        Route::prefix('api/authorization')
            ->middleware('api')
            ->namespace($this->authorizationNamespace)
            ->group(base_path('routes/api/authorization.php'));

        // Authentication route endpoints
        Route::prefix('api/authentication')
            ->middleware('api')
            ->namespace($this->authenticationNamespace)
            ->group(base_path('routes/api/authentication.php'));

        // User route endpoints
        Route::prefix('api/user')
            ->middleware('api')
            ->namespace($this->userNamespace)
            ->group(base_path('routes/api/user.php'));
    }
}
