<?php

namespace App\Models;

use App\Services\Helpers\EventHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property array $title
 * @property array|null $subtitle
 * @property mixed|null $dates
 * @property array|null $text_preview
 * @property bool|null $is_hot
 * @property bool|null $is_published
 * @property array|null $views
 * @property int $order
 * @property int|null $venue_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventClass[] $classes
 * @property-read int|null $classes_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventPrice[] $prices
 * @property-read int|null $prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Teacher[] $teachers
 * @property-read int|null $teachers_count
 * @property-read \App\Models\Venue|null $venue
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTextPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVenueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereViews($value)
 * @mixin \Eloquent
 */
class Event extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'is_hot',
        'is_published',
        'views',
        'venue_id',
    ];

    public $translatable = [
        'title',
        'subtitle',
    ];

    protected $casts = [
        'is_hot'       => 'boolean',
        'is_published' => 'boolean',
        'views'        => 'array',
    ];

    /**  Accessors & Mutators */

    public function dates(): Attribute
    {
        return Attribute::make(
            get: fn () => EventHelper::getDatesFromClasses($this->classes),
        );
    }

    public function dateStart(): Attribute
    {
        return Attribute::make(
            get: fn () => data_get($this, 'dates.0.start_at'),
        );
    }

    public function previewImage(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('preview_image'),
        );
    }

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('image'),
        );
    }

    /** Relations */

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(EventClass::class);
    }

    public function prices(): HasManyThrough
    {
        return $this->hasManyThrough(EventPrice::class, EventClass::class);
    }
}
