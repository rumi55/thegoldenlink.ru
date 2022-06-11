<?php

namespace App\Models;

use App\Models\Enums\Sex;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements HasMedia, FilamentUser, HasAvatar
{
    use HasApiTokens;
    use Notifiable;
    use HasFactory;
    use HasRoles;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'spiritual_name',
        'email',
        'sex',
        'phone',
        'is_subscribed',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sex'               => Sex::class,
        'email_verified_at' => 'immutable_datetime',
        'is_subscribed'     => 'boolean',
    ];

    /** Help Methods */

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function canAccessFilament(): bool
    {
        if ($this->hasPermissionTo('cabinet.auth')) {
            return true;
        }

        if ($this->isAdmin()) {
            return true;
        }

        return false;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->getFirstMedia('avatar')?->getUrl();
    }

    /**  Accessors & Mutators */

    public function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => !$value ? $this->password : $value,
        );
    }
}
