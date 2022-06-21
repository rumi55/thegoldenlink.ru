<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function change(Request $request): RedirectResponse
    {
        $request->session()->put('locale', $request->input('locale', 'ru'));

        return back();
    }
}
