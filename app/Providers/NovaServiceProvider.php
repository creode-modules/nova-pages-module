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
        PageResource::$model = config('pages.pages_model', \Modules\Pages\app\Models\Page::class);
        PageResource::$trafficCop = config('pages.traffic_cop');
        Nova::resources(
            [
                PageResource::class
            ]
        );
    }
}
