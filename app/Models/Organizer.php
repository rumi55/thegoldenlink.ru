<?php

namespace App\Models;

use App\Models\Traits\HasCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Organizer extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use HasCity;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'city_id',
    ];

    public $translatable = [
        'name',
    ];
}
