<?php


namespace Onesla\Permission;

use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../config/permission.php' => config_path('permission.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/permission.php', 'permission');
    }
}
