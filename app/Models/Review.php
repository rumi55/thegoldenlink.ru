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
 * App\Models\Review
 *
 * @property int $id
 * @property array $name
 * @property array|null $text
 * @property string|null $link_to_youtube
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\ReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereLinkToYoutube($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Review extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'text',
        'link_to_youtube',
    ];

    public $translatable = [
        'name',
        'text',
    ];

    const COLLECTION = 'photo';
    const THUMB = 'thumb';

    /** Accessors & Mutators */

    public function photo(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl(static::COLLECTION),
        );
    }

    public function thumb(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl(static::COLLECTION, static::THUMB),
        );
    }

    /** Settings */

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(static::THUMB)
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->quality(90);
    }
}
