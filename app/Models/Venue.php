<?php

namespace App\Models;

use App\Models\Traits\HasCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Venue
 *
 * @property int $id
 * @property array $name
 * @property array|null $address
 * @property array|null $coordinates
 * @property array|null $description
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|Venue byCity(int $cityId)
 * @method static \Database\Factories\VenueFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCoordinates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
