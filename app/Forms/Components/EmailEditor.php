<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class EmailEditor extends Field
{
    protected string $view = 'forms.components.email-editor';

    protected function setUp(): void
    {
        parent::setUp();
        $this->default(['json' => null, 'html' => null]);
    }
}
