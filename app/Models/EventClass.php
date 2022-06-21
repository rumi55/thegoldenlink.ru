<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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
class EventClass extends Model
{
    use HasFactory;
    use HasTranslations;

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

    const AFTER_REGISTER = 'after_register';
    const AFTER_PAY = 'after_pay';
    const AFTER_CLASS = 'after_class';
    const AFTER_EVENT = 'after_event';

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
