<?php

namespace Modules\Pages\app\Events;

use Illuminate\Foundation\Events\Dispatchable;

class PageContentBlockViewsEvent
{

    use Dispatchable;

    public $views = [];

}
