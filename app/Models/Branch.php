<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'phone_1',
        'phone_2',
        'email',
        'address',
        'address_en',
        'latitude',
        'longitude'
    ];
    
}
