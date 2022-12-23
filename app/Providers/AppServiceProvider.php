<?php

namespace App\Providers;

use App\Repository\AdminRepository;
use App\Repository\IAdminRepository;
use App\Repository\IPostRepository;
use App\Repository\PostRepository;
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
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
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
