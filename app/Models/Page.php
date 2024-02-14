<?php

namespace Modules\Pages\app\Models;

use Illuminate\Database\Eloquent\Model;
use PawelMysior\Publishable\Publishable;
use Spatie\Translatable\HasTranslations;
use Modules\Pages\Database\factories\PageFactory;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;
    use Publishable;

    protected $fillable = [
        'is_homepage',
        'permalink',
        'title',
        'description',
        'content',
    ];

    public $translatable = [
        'title',
        'description',
    ];

    protected $casts = [
        'content' => FlexibleCast::class,
    ];

    public static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }
}
