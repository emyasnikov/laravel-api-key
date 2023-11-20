<?php

namespace Emyasnikov\LaravelApiKey;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $middleware = ApiKeyMiddleware::class;

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware(config('api_key.alias'), $middleware);

        $this->publishes([
            __DIR__.'/../config/api_key.php' => config_path('api_key.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/api_key.php', 'api_key');
    }
}
