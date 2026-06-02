<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } elseif ($request->cookie('locale')) {
            app()->setLocale($request->cookie('locale'));
            session(['locale' => $request->cookie('locale')]);
        }
        return $next($request);
    }
}