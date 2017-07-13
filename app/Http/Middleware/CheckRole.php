<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param string $role
	 * @param string|null $guard
	 *
	 * @return mixed
	 */
    public function handle($request, Closure $next, $role, $guard = null)
    {
	    if (!Auth::guard($guard)->check()) {
		    return redirect('/login');
	    }

	    $user = Auth::guard($guard)->user();

	    if ($user instanceof User) {
			if (!$user->hasRole($role)) {
				return new Response(view('forbidden'), 403);
			}
	    }

        return $next($request);
    }
}
