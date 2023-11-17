<?php

namespace Modules\Pages\app\Abstracts;

use Illuminate\Support\Facades\Event;
use Modules\Pages\app\Events\PageContent as PageContentEvent;
use Modules\Pages\app\Events\PageContentBlockViews as PageContentBlockViewsEvent;

abstract class PageBlockAbstract
{

    protected $label = '';
    protected $name = '';
    protected $fields = [];
    protected $view = '';

    public function __construct()
    {
        $this->setFields();
        $this->registerLayout();
        $this->registerView();
    }

    abstract protected function setFields();

    private function registerLayout()
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

    private function registerView()
    {
        Event::listen(
            function(PageContentBlockViewsEvent $PageContentBlockViewsEvent) {
                $PageContentBlockViewsEvent->views[$this->name] = $this->view;
            }
        );
    }

}