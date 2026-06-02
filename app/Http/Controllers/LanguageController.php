<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        if (in_array($lang, ['fr', 'ar'])) {
            cookie()->queue(cookie()->forever('locale', $lang));
            app()->setLocale($lang);
            session(['locale' => $lang]);
        }
        return redirect()->back();
    }
}