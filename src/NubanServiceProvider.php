<?php

namespace Olabodeabesin\Nuban;

use Illuminate\Support\ServiceProvider;

class NubanServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        //
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        
    }
}
