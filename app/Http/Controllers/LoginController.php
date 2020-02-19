<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	function __construct(){
		$this->middleware('isLogin',['except' => ['logout']]);
	}

	public function formLogin(){
		return view('auth.login');
	}

	public function login(Request $r){
		if(\Auth::attempt([
					"username" => $r->username,
					"password" => $r->password,
				])){
			$level = \Auth::user()->level->nama;

			switch($level) {
				case 'Administrator':
					return redirect()->route('level.index');
					break;
				case 'Operator':
					return redirect()->route('level.index');
					break;
				case 'Masyarakat':
					return redirect()->route('lelang.index');
					break;
				default: 
					break;
			}
		}
		return redirect()->route('auth.formLogin')->with('error','Username / Password Salah');
	}

	public function logout(){
		\Auth::logout();
		\Session::flush();
		return view('auth.login');
	}

}
