<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
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

        Blade::directive('includeSvg', function ($arg) {
            return file_get_contents(public_path(trim($arg, '\"\'')));
        });

        View::composer('*', function (\Illuminate\View\View $view) {
            $view->with('mainMenu', [
                [
                    'link' => route('home'),
                    'title' => __('site.menu.home'),
                ],
                [
                    'link' => route('events'),
                    'title' => __('site.menu.schedule'),
                ],
                [
                    'link' => route('teachers'),
                    'title' => __('site.menu.teachers'),
                ],
                [
                    'link' => route('contacts'),
                    'title' => __('site.menu.contacts'),
                ],
            ]);

            $view->with('socialLinks', [
                'instagram' => 'https://www.instagram.com/thegoldenlink.ru/',
                'vk' => 'https://www.instagram.com/thegoldenlink.ru/',
                'telegram' => 'https://www.instagram.com/thegoldenlink.ru/',
            ]);
        });
    }
}
