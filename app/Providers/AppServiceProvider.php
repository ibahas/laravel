<?php

namespace App\Providers;

use App\Repositories\PostsInterface;
use App\Repositories\PostsRepository;
use App\Repositories\ProductsInterface;
use App\Repositories\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //  $this->app->bind(UsersInterface::class,UsersRepository::class);
        $this->app->bind(PostsInterface::class, PostsRepository::class);
        $this->app->bind(ProductsInterface::class, ProductsRepository::class);
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
