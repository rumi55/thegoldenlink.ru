<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Http\Request;

class AdminLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            app()->setLocale($request->session()->get('locale'));
        }

        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label(app()->getLocale() == 'en' ? 'Русский' : 'English')
                    ->url(route('admin.locale', ['locale' => app()->getLocale() == 'en' ? 'ru' : 'en']))
                    ->icon('heroicon-o-globe'),
            ]);
        });

        return $next($request);
    }
}
