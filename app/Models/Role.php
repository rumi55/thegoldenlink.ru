<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Role extends \Spatie\Permission\Models\Role
{
    use HasTranslations;

    public $translatable = [
        'display_name'
    ];
}
