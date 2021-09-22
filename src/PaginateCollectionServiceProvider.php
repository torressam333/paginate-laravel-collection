<?php

namespace Sammyt\PaginateCollection;

use Illuminate\Support\ServiceProvider;

class PaginateCollectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $file = app_path('Helpers/helpers.php');
        if (file_exists($file)) {
            require_once $file;
        }


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
