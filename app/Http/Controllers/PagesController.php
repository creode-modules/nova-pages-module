<?php

namespace Modules\Pages\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Pages\app\Models\Page;
use Modules\Pages\app\Events\PageContentBlockViews as PageContentBlockViewsEvent;

class PagesController extends Controller
{

    public function home()
    {
        $page = Page::firstWhere('is_homepage', 1);

        if(!$page){
            abort(404);
        }

        return $this->render($page);
    }

    public function show(Page $page)
    {
        if($page->is_homepage) {
            abort(404);
        }

        return $this->render($page);
    }

    protected function render(Page $page)
    {
        $pageContentBlockViewsEvent = new PageContentBlockViewsEvent();

        event($pageContentBlockViewsEvent);

        $content = array_map(
            function(array $contentBlock) use ($pageContentBlockViewsEvent) {
                $contentBlock['view'] = $pageContentBlockViewsEvent->views[$contentBlock['layout']];

                return $contentBlock;
            },
            $page->getContent()
        );

        return view(
            'pages::layout',
            [
                'title' => $page->title,
                'description' => $page->description,
                'content' => $content,
            ]
        );
    }

}
