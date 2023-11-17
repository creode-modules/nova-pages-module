<?php

namespace Modules\Pages\app\Abstracts;

use Illuminate\Support\Facades\Event;
use Modules\Pages\app\Events\PageContent as PageContentEvent;

abstract class PageBlockAbstract
{

    protected $label = '';
    protected $name = '';
    protected $fields = [];

    public function __construct()
    {
        $this->addFields();
        $this->addLayout();
    }

    abstract protected function addFields();

    protected function addLayout()
    {
        Event::listen(
            function(PageContentEvent $pageContentEvent) {
                $pageContentEvent->content->addLayout(
                    $this->label,
                    $this->name,
                    $this->fields
                );
            }
        );
    }

}