<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'overview',
        'overview_en',
        'description',
        'description_en',
        'slug',
        'main_image',
        'banner_image',
    ];

    // Automatically generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($article) {
            if (!$article->slug) {
                $article->slug = Str::slug($article->title);

                // Check if the slug already exists, if so, make it unique
                if (self::where('slug', $article->slug)->exists()) {
                    $article->slug = $article->slug . '-' . Str::random(3);
                }
            }
        });
    }
    
}
