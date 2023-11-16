<?php

namespace Modules\Pages\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Modules\Pages\Database\factories\PageFactory;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'is_homepage',
        'permalink',
        'title',
        'description',
    ];

    public $translatable = [
        'title',
        'description',
    ];
    
    public static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }
}
