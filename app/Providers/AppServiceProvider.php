<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (glob(app_path('Repositories/Interfaces') . '/*.php') as $file) {
            $interface = 'App\\Repositories\\Interfaces\\' . basename($file, '.php');
            $implementation = 'App\\Repositories\\' . str_replace('Interface', '', basename($file, '.php'));
    
            if (interface_exists($interface) && class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
