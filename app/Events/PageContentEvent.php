<?php

namespace Modules\Pages\app\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Whitecube\NovaFlexibleContent\Flexible as FlexibleField;

/**
 * This class is deprecated and will be removed in a future release.
 * Please use the nova-page-builder package instead.
 *
 * @deprecated 1.0.4
 */
class PageContentEvent
{

    use Dispatchable;

    public $content = null;

    public function __construct(FlexibleField $content)
    {
        $this->content = $content;
    }

}
