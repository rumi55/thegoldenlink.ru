<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                __('Events'),
                __('Content'),
                __('Email'),
                __('Users'),
            ]);

            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label(__('Go To Site'))
                    ->url(route('home'))
                    ->icon('heroicon-o-external-link'),
            ]);
        });

        ViewComponent::macro('ruHelp', function () {
            return $this->helperText('По русски');
        });

        ViewComponent::macro('enHelp', function () {
            return $this->helperText('English');
        });
    }
}
