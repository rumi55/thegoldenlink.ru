<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasTranslations;

    public $translatable = [
        'display_name'
    ];
}
