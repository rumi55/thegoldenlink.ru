<?php

namespace App\Models;

use App\Models\Enums\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\EventPrice
 *
 * @property int $id
 * @property int $price
 * @property Currency $currency
 * @property \Carbon\CarbonImmutable|null $expire_at
 * @property int $event_class_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventClass $eventClass
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereEventClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'currency',
        'expire_at',
    ];

    protected $casts = [
        'price'     => 'integer',
        'currency'  => Currency::class,
        'expire_at' => 'immutable_datetime',
    ];

    /** Relations */

    public function eventClass(): BelongsTo
    {
        return $this->belongsTo(EventClass::class);
    }
}
