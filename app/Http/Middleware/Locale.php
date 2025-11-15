<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the session contains a locale, otherwise use default locale
        $locale = Cookie::get('locale', config('app.locale'));

        // Set the application locale
        App::setLocale($locale);

        return $next($request);
    }
}

