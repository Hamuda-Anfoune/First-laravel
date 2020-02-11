<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Below, Added to stop getting an error due to using a string in the migration: create_posts_table
        // Uses: illuminate\Support\Facades\Schema;
        //Schema::defaultStringLength(191);
    }
}
