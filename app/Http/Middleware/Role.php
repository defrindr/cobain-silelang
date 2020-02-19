<?php
namespace App\Http\Middleware;

use App\User;
use Closure;

class Role {
	public function handle($request,Closure $next,$roles){
		// dd($roles);
		$roles = explode('-', $roles);

		$lanjut = false;

		foreach ($roles as $role) {
			// dd(\Auth::user()->level->nama);
			if(\Auth::check() && \Auth::user()->level->nama == $role){
				$lanjut = true;
			}
		}


		if($lanjut){
			return $next($request);
		}else {
			return abort(403,'Akses Ditolak');
		}
	}
}