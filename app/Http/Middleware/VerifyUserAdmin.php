<?php


namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

class VerifyUserAdmin
{
    public function handle($request, $next)
    {
        if (Session::get('username') == null || Session::get('user_id') == null) {

            return redirect('/admin/log-in');
        }
        else{
            return $next($request);
        }
    }
}