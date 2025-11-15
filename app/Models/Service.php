<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'overview',
        'overview_en',
        'slug',
        'description',
        'description_en',
        'main_image',
        'imgs',
        'video',
        'youtube_urls',
    ];

    // Automatically generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($service) {
            if (!$service->slug) {
                $service->slug = Str::slug($service->title);

                // Check if the slug already exists, if so, make it unique
                if (self::where('slug', $service->slug)->exists()) {
                    $service->slug = $service->slug . '-' . Str::random(3);
                }
            }
        });
    }
    
}
