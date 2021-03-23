<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\CheckSession;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if (CheckSession::checkLogin($role, $request) == 401) {
            return redirect()->route('login', $role);
        }

        return $next($request);
    }
}
