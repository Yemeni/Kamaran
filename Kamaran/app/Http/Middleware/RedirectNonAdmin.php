<?php

namespace App\Http\Middleware;

use Closure;

class RedirectNonAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!in_array(auth()->user()->level, ['admin', 'manager']))
		{
    		return redirect('/profile');
		}

		return $next($request);
	}
}
