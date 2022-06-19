<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class CustomBlock extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'text',
        'type',
    ];

    public $translatable = [
        'name',
        'text',
    ];

    public static function types(): array
    {
        return [
            'header'      => __('Home'),
            'teacher'     => __('Teachers'),
            'statistic_1' => __('Statistic 1'),
            'statistic_2' => __('Statistic 2'),
            'statistic_3' => __('Statistic 3'),
            'statistic_4' => __('Statistic 4'),
            'statistic_5' => __('Statistic 5'),
        ];
    }
}
