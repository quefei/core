<?php

namespace Quefei\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Quefei\Core\Console\MakeCoreCommand;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 注册 Artisan 命令
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeCoreCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
