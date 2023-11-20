<?php

namespace Modules\Pages\app\Models;

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
