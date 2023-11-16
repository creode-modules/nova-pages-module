<?php

namespace Modules\Pages\app\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Modules\Pages\app\Nova\PageResource;

class NovaServiceProvider extends NovaApplicationServiceProvider
{

    public function boot(): void
    {
        $this->registerResources();
    }

    protected function registerResources()
    {
        Nova::resources(
            [
                PageResource::class
            ]
        );
    }

}
