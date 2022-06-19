<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class MapPicker extends Field
{
    protected string $view = 'forms.components.map-picker';

    protected array $mapConfig = [
        'center' => [
            'lat' => '55.722700',
            'lng' => '37.572200',
        ],
    ];

    public function center(?array $value = null)
    {
        if ($value) {
            return $this->setMapConfigProperty('center', $value);
        }

        return $this->getMapConfigProperty('center');
    }

    public function getMapConfigProperty(string $key, mixed $default = null): mixed
    {
        return data_get($this->mapConfig, $key, $default);
    }

    public function setMapConfigProperty(string $name, mixed $value): static
    {
        $this->mapConfig[$name] = $value;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->default(['lat' => null, 'lng' => null]);
    }
}
