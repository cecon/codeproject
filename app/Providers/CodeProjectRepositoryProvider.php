<?php

namespace CodeProject\Providers;

use CodeProject\Repositories\ClientRepository;
use CodeProject\Repositories\ClientRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
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
        $this->app->bind(ClientRepository::class,
            ClientRepositoryEloquent::class);
    }
}
