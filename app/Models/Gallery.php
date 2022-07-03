<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\GalleryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public const COLLECTION = 'images';
    public const THUMB = 'thumb';
    public const RESIZE = 'resize';

    protected $fillable = [
        'name',
    ];

    public $translatable = [
        'name',
    ];

    /** Attributes */

    public function images(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getMedia(static::COLLECTION) ?: [],
        );
    }

    /** Settings */

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(static::THUMB)
            ->fit(Manipulations::FIT_CROP, 230, 155)
            ->quality(90);

        $this->addMediaConversion(static::RESIZE)
            ->fit(Manipulations::FIT_CONTAIN, 1920, 1080)
            ->quality(90);
    }
}
