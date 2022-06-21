<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\MailingList
 *
 * @property int $id
 * @property string $name
 * @property array|null $whom
 * @property \Carbon\CarbonImmutable|null $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EmailTemplate|null $emailTemplate
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailingList whereWhom($value)
 * @mixin \Eloquent
 */
class MailingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'whom',
        'sent_at',
    ];

    protected $casts = [
        'whom'    => 'array',
        'sent_at' => 'immutable_datetime',
    ];

    public function emailTemplate(): MorphOne
    {
        return $this->morphOne(EmailTemplate::class, 'emailable');
    }
}
