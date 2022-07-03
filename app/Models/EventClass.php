<?php

namespace App\Models;

use App\Listeners\EventClassSaved;
use App\Services\Helpers\EventHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\EventClass
 *
 * @property int $id
 * @property array $title
 * @property array $subtitle
 * @property array $dates
 * @property bool|null $is_payable
 * @property bool|null $is_free
 * @property int $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmailTemplate[] $emailTemplates
 * @property-read int|null $email_templates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmailTemplate[] $emailTemplatesAfterClass
 * @property-read int|null $email_templates_after_class_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmailTemplate[] $emailTemplatesAfterEvent
 * @property-read int|null $email_templates_after_event_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmailTemplate[] $emailTemplatesAfterPay
 * @property-read int|null $email_templates_after_pay_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmailTemplate[] $emailTemplatesAfterRegister
 * @property-read int|null $email_templates_after_register_count
 * @property-read \App\Models\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventPrice[] $prices
 * @property-read int|null $prices_count
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereIsPayable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventClass whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventClass extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'is_payable',
        'is_free',
        'dates',
        'event_id',
    ];

    public $translatable = [
        'title',
        'subtitle',
    ];

    protected $casts = [
        'is_payable' => 'boolean',
        'is_free' => 'boolean',
        'dates' => 'array',
    ];

    public const AFTER_REGISTER = 'after_register';
    public const AFTER_PAY = 'after_pay';
    public const AFTER_CLASS = 'after_class';
    public const AFTER_EVENT = 'after_event';
    public const COLLECTION = 'image';

    protected static function booted()
    {
        static::saved(function (EventClass $eventClass) {
            $eventClass->event->update([
                'date_start' => EventHelper::getDateStartFromClasses($eventClass->event->classes),
            ]);
        });
    }

    /** Attributes */

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getFirstMediaUrl(static::COLLECTION),
        );
    }

    /** Relations */

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(EventPrice::class);
    }

    public function emailTemplates(): MorphToMany
    {
        return $this->morphToMany(EmailTemplate::class, 'emailable');
    }

    public function emailTemplatesAfterRegister(): MorphToMany
    {
        return $this->emailTemplates()->withPivotValue('type', static::AFTER_REGISTER);
    }

    public function emailTemplatesAfterPay(): MorphToMany
    {
        return $this->emailTemplates()->withPivotValue('type', static::AFTER_PAY);
    }

    public function emailTemplatesAfterClass(): MorphToMany
    {
        return $this->emailTemplates()->withPivotValue('type', static::AFTER_CLASS);
    }

    public function emailTemplatesAfterEvent(): MorphToMany
    {
        return $this->emailTemplates()->withPivotValue('type', static::AFTER_EVENT);
    }
}
