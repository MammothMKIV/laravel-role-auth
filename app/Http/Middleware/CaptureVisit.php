<?php

namespace App\Http\Middleware;

use App\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaptureVisit
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
    	if ($request->method() === Request::METHOD_GET) {
		    $visit = new Visit();

		    $visit->path = $request->getPathInfo();
		    $visit->user()->associate(Auth::user());
		    $visit->ip = $request->getClientIp();

		    $visit->save();
	    }

        return $next($request);
    }
}
