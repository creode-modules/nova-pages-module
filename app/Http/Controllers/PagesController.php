<?php

namespace Modules\Pages\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Pages\app\Models\Page;

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
        return '<pre>' . print_r($page, true) . '</pre>';
    }

}
