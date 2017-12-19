<?php

namespace Gelladus\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Produto',
            'Estoque',
            'Pedido',
            'User',
        ];

        foreach ($models as $model){
            $this->app->bind(
                "Gelladus\Repositories\\{$model}Repository",
                "Gelladus\Repositories\\{$model}RepositoryEloquent"
            );
        }

        //:end-bindings:
    }
}
