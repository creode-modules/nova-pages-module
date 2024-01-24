<?php

namespace Modules\Pages\app\Models;

/**
 * This class is deprecated and will be removed in a future release.
 * Please use the nova-page-builder package instead.
 *
 * @deprecated 1.0.4
 */
class PageContentBlock
{

    protected $view = '';
    protected $attributes = [];

    public function __construct(string $view, array $attributes)
    {
        $this->view = $view;
        $this->attributes = $attributes;
    }

    public function view()
    {
        return $this->view;
    }

    public function attributes()
    {
        return $this->attributes;
    }

}
