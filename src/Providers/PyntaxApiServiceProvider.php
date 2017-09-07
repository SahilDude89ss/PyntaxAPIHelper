<?php

namespace Pyntax\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class PyntaxApiServiceProvider
 * @package Pyntax\Providers
 */
class PyntaxApiServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/pyntax-api-helper.php' => config_path('pyntax-api-helper'),
        ]);

        $this->loadRoutesFrom('/../../routes/api.php');
    }


    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        // We would need to register all the routes here.
    }
}