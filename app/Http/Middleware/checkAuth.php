<?php
namespace App\Http\Middleware;

use Closure;

class checkAuth {

	public function handle($request, Closure $next){
		if(\Auth::check()){
			return $next($request);
		}
		return redirect()->route('auth.formLogin');
	}

}