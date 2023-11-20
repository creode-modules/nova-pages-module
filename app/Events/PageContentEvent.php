<?php

namespace Modules\Pages\app\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Whitecube\NovaFlexibleContent\Flexible as FlexibleField;

class PageContentEvent
{

    use Dispatchable;

    public $content = null;

    public function __construct(FlexibleField $content)
    {
        $this->content = $content;
    }

}
