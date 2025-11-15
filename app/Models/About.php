<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'title',
        'title_en',
        'description',
        'description_en',
        'main_image',
        'sort_order',
    ];
    
}
