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
        'content',
    ];

    public $translatable = [
        'title',
        'description',
    ];

    public function getContent(): array
    {
        return json_decode($this->content, true);
    }
    
    public static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }
}
