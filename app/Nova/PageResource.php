<?php

namespace Modules\Pages\app\Nova;

use Laravel\Nova\Resource;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Text as TextField;
use Laravel\Nova\Fields\Textarea as TextareaField;
use Laravel\Nova\Fields\Boolean as BooleanField;
use Whitecube\NovaFlexibleContent\Flexible as FlexibleField;
use Modules\Pages\app\Models\Page;
use Modules\Pages\app\Events\PageContentEvent;

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
            ->onlyOnForms()
            ->fullWidth()
            ->collapsed()
            ->button('Add Block');

        $pageContentEvent = new PageContentEvent($content);

        event($pageContentEvent);

        return [
            BooleanField::make(
                'Is homepage',
                'is_homepage'
            ),
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
            $pageContentEvent->content,
        ];
    }
}
