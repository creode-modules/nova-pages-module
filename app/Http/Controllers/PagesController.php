<?php

namespace Modules\Pages\app\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Pages\app\Models\Page;
use App\Http\Controllers\Controller;
use Modules\Pages\app\Models\PageContentBlock;
use Whitecube\NovaFlexibleContent\Layouts\Layout;
use Modules\Pages\app\Events\PageContentBlockViewsEvent;

class PagesController extends Controller
{

    public function home()
    {
        $page = Page::firstWhere('is_homepage', 1);

        if (!$page) {
            abort(404);
        }

        return $this->render($page);
    }

    public function show(Request $request)
    {
        $page = Page::firstWhere('permalink', $request->path());
        if (!$page) {
            abort(404);
        }

        if ($page->is_homepage) {
            abort(404);
        }

        return $this->render($page);
    }

    protected function render(Page $page)
    {
        $pageContentBlockViewsEvent = new PageContentBlockViewsEvent();

        event($pageContentBlockViewsEvent);

        $content = $page->content->map(
            function (Layout $layout) use ($pageContentBlockViewsEvent) {
                return new PageContentBlock(
                    $pageContentBlockViewsEvent->views[$layout->name()],
                    json_decode(json_encode($layout->getAttributes()), true)
                );
            }
        );

        return view(
            'pages::page',
            [
                'title' => $page->title,
                'description' => $page->description,
                'content' => $content,
            ]
        );
    }
}
