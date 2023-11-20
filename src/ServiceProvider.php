<?php

namespace Emyasnikov\LaravelApiKey;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param  \Illuminate\Contracts\Http\Kernel  $kernel
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $middleware = ApiKeyMiddleware::class;

        $kernel->appendMiddlewareToGroup(config('api_key.group'), $middleware);

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware(config('api_key.alias'), $middleware);

        $this->publishes([
            __DIR__.'/../config/api_key.php' => config_path('api_key.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/api_key.php', 'api_key');
    }
}
