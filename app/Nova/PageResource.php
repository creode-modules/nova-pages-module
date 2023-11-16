<?php

namespace Modules\Pages\app\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Modules\Pages\app\Models\Page;
use Laravel\Nova\Fields\Text as TextField;
use Laravel\Nova\Fields\Textarea as TextareaField;
use Laravel\Nova\Fields\Boolean as BooleanField;
use Whitecube\NovaFlexibleContent\Flexible as FlexibleField;
use Modules\Pages\app\Events\PageContent as PageContentEvent;

class PageResource extends Resource
{

    public static $model = Page::class;

    public static function label()
    {
        return 'Pages';
    }

    public function fields(NovaRequest $request)
    {
        $content = FlexibleField::make('Content')
            ->button('Add Block');

        $pageContentEvent = new PageContentEvent($content);

        event($pageContentEvent);

        return [
            BooleanField::make('Is homepage'),
            TextField::make('Permalink')
                ->rules('max:255'),
            TextField::make('Title')
                ->rules('max:255')
                ->translatable(),
            TextareaField::make('Description')
                ->translatable(),
            $pageContentEvent->content,
        ];
    }

}