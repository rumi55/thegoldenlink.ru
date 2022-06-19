<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'title',
        'subtitle',
        'text_preview',
        'is_hot',
        'is_published',
        'views',
        'venue_id',
    ];

    public $translatable = [
        'title',
        'subtitle',
        'text_preview',
    ];

    protected $casts = [
        'is_hot'       => 'boolean',
        'is_published' => 'boolean',
        'views'        => 'array',
    ];

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
}
