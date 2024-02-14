<?php

namespace Modules\Pages\app\Repositories;

use Creode\LaravelRepository\BaseRepository;

class PageRepository extends BaseRepository
{
    /**
     * {@ineritdoc}
     */
    protected function getModel(): string {
        return config('pages.page_model', \Modules\Pages\app\Models\Page::class);
    }
}
