<?php

namespace App\Providers;

use App\Repositories\Contracts\LayoutRepositoryInterface;
use App\Repositories\Contracts\SessaoRepositoryInterface;
use App\Repositories\Eloquent\LayoutRepository;
use App\Repositories\Eloquent\SessaoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LayoutRepositoryInterface::class,
            LayoutRepository::class
        );
        $this->app->bind(
            SessaoRepositoryInterface::class,
            SessaoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
