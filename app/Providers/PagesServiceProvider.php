<?php

namespace Modules\Pages\app\Providers;

use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Pages';

    protected string $moduleNameLower = 'pages';

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register(): void
    {
        $this->app->register(NovaServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

}
