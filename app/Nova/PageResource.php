<?php

namespace Modules\Pages\app\Nova;

use Creode\NovaPageBuilder\Nova\Fields\PageBuilder;
use Creode\NovaPublishable\Published;
use Laravel\Nova\Resource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Text as TextField;
use Laravel\Nova\Fields\Textarea as TextareaField;
use Laravel\Nova\Fields\Boolean as BooleanField;
use Modules\Pages\app\Models\Page;

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
            BooleanField::make(
                'Is homepage',
                'is_homepage'
            ),
            Published::make('Published', 'published_at'),
            TextField::make('Permalink')
                ->rules('max:255')
                ->dependsOn(
                    'is_homepage',
                    function (TextField $field, NovaRequest $request, FormData $formData) {
                        if ($formData->is_homepage) {
                            $field->hide()->rules('sometimes');
                        } else {
                            $field->show()->rules('required');
                        }
                    }
                ),
            TextField::make('Title')
                ->rules('max:255')
                ->translatable(),
            TextareaField::make('Description')
                ->translatable(),
            PageBuilder::make('Content')
                ->exclude(config('pages.excluded_blocks', ['banner'])),
        ];
    }
}
