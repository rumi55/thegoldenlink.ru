<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

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

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
