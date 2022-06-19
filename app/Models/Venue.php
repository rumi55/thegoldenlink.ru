<?php

namespace App\Models;

use App\Models\Traits\HasCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Venue extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasCity;

    protected $fillable = [
        'name',
        'address',
        'coordinates',
        'description',
        'city_id',
    ];

    public $translatable = [
        'name',
        'address',
        'description',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];
}
