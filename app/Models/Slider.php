<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title',
        'title_en',
        'description',
        'description_en',
        'btn_text',
        'btn_text_en',
        'btn_url',
    ];
}
