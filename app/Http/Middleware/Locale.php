<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/24/2017
 * Time: 4:34 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class Locale
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('locale')) {
            Session::put('locale', config('app.locale'));

        }

        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}