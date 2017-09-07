<?php

namespace Pyntax\Providers;

use Illuminate\Support\ServiceProvider;
use Pyntax\Repositories\EloquentRepository;
use Pyntax\Services\Service;
use Pyntax\Traits\ConfigResource;

/**
 * Class PyntaxApiServiceProvider
 * @package Pyntax\Providers
 */
class PyntaxApiServiceProvider extends ServiceProvider
{
    use ConfigResource;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/pyntax-api-helper.php' => config_path('pyntax-api-helper.php'),
        ]);
    }

    /**
     * This function register all the Dynamic Services and Repositories.
     */
    protected function registerAllDynamicRepositoriesAndServices()
    {
        // Lets load all the Configs.
        $allResourceConfig = $this->loadConfig();

        // Lets load all the Active Resources.
        if (!empty($allResourceConfig) && !empty($allResourceConfig['activeResources'])) {

            // Loop through all the Active resources.
            foreach ($allResourceConfig['activeResources'] as $activeResourceName => $activeResource) {

                // Lets load the repository
                $repository = $activeResource['repository'];

                // If we don't have a Repository registered.
                if (empty($activeResource['repository']) && !empty($activeResource['model'])) {

                    $model = app($activeResource['model']);

                    // ToDo: We should be able to create Cache or some other kind of Repository
                    // Lets crate an eloquent repo.

                    $this->app->singleton('Pyntax\Repositories\\' . ucfirst(strtolower($activeResourceName)), function () use ($model) {
                        return new EloquentRepository($model);
                    });

                    $repository = app('Pyntax\Repositories\\' . ucfirst(strtolower($activeResourceName)));
                }

                // If we don't have a Service and We already have a service.
                if (empty($activeResource['service']) && !empty($repository)) {
                    $this->app->singleton('Pyntax\Services\\' . ucfirst(strtolower($activeResourceName)), function () use ($repository) {
                        // If the repository is just a String loaded from the Config, lets convert into an Object now.
                        if (is_string($repository)) {
                            $repository = app($repository);
                        }

                        // Lets register this service now.
                        return new Service($repository);
                    });
                }
            }
        }
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
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');

        // We need to register Dynamic Services and Repositories on the basis of the Config passed.
        $this->registerAllDynamicRepositoriesAndServices();
    }
}