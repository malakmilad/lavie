<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    use HasFactory;

    protected $table = 'services_faq';

    protected $fillable = [
        'service_id',
        'question',
        'question_en',
        'answer',
        'answer_en',
        'link',
        'video',
    ];
}
