<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
