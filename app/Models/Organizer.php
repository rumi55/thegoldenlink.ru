<?php

namespace App\Models;

use App\Models\Traits\HasCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Organizer
 *
 * @property int $id
 * @property array $name
 * @property string|null $phone
 * @property string|null $email
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer byCity(int $cityId)
 * @method static \Database\Factories\OrganizerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organizer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
