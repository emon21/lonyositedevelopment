<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (session()->has('locale')) {
        //     App::setLocale(session('locale'));
        // }

        // if (session()->has('locale')) {
        //     App::setLocale(session('locale'));  // 'bn' সেট করে দেয়
        // }

        // Session থেকে locale নিয়ে set করুন, না থাকলে default 'en'
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        } else {
            App::setLocale('en'); // অথবা config('app.locale')
        }
        return $next($request);
    }
}
