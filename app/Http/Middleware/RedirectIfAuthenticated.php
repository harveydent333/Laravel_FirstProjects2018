<?php

namespace App\Http\Middleware;
use App\test;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $data = test::all();
        if (Auth::guard($guard)->check()) {
            return redirect('/admin',['data'=>$data]);
        }

        return $next($request);
    }
}
