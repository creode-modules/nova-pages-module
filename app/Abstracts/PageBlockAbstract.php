<?php

namespace Modules\Pages\app\Abstracts;

use Illuminate\Support\Facades\Event;
use Modules\Pages\app\Events\PageContentEvent;
use Modules\Pages\app\Events\PageContentBlockViewsEvent;

/**
 * This class is deprecated and will be removed in a future release.
 * Please use the nova-page-builder package instead.
 *
 * @deprecated 1.0.4
 */
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

    abstract protected function fields();

    private function setFields()
    {
        $this->fields = $this->fields();
    }

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
