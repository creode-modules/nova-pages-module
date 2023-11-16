<?php

namespace Modules\Pages\app\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Modules\Pages\app\Models\Page;
use Laravel\Nova\Fields\Text as TextField;
use Laravel\Nova\Fields\Textarea as TextareaField;
use Laravel\Nova\Fields\Boolean as BooleanField;

class PageResource extends Resource
{

    public static $model = Page::class;

    public static function label()
    {
        return 'Pages';
    }

    public function fields(NovaRequest $request)
    {
        return [
            BooleanField::make('Is homepage'),
            TextField::make('Permalink')
                ->rules('max:255'),
            TextField::make('Title')
                ->rules('max:255')
                ->translatable(),
            TextareaField::make('Description')
                ->translatable(),
        ];
    }

}