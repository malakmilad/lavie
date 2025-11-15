<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    use HasFactory;

    protected $table = 'services_reviews';

    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'img'
    ];
}
