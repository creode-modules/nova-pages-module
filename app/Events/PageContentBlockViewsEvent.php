<?php

namespace Modules\Pages\app\Events;

use Illuminate\Foundation\Events\Dispatchable;

/**
 * This class is deprecated and will be removed in a future release.
 * Please use the nova-page-builder package instead.
 *
 * @deprecated 1.0.4
 */
class PageContentBlockViewsEvent
{

    use Dispatchable;

    public $views = [];

}
