<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\CustomBlock
 *
 * @property int $id
 * @property array $name
 * @property string $type
 * @property array|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomBlock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomBlock extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public const COLLECTION = 'image';

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
            'header'      => __('Header'),
            'teachers'     => __('Teachers'),
            'statistic_1' => __('Statistic 1'),
            'statistic_2' => __('Statistic 2'),
            'statistic_3' => __('Statistic 3'),
            'statistic_4' => __('Statistic 4'),
            'statistic_5' => __('Statistic 5'),
        ];
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl(static::COLLECTION),
        );
    }
}
