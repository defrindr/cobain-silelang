<?php
namespace App\Helpers;

class RoleHelper {
	// public boolean $admin = \Auth::user()->level->nama == "Administrator" ? true : false ;
	// public boolean $op = \Auth::user()->level->nama == "Operator" ? true : false ;
	// public boolean $masy = \Auth::user()->level->nama == "Masyarakat" ? true : false ;

	public static function admin() { return (\Auth::user()->level->nama == "Administrator") ? true : false;}
	public static function op() { return (\Auth::user()->level->nama == "Operator") ? true : false;}
	public static function masy() { return (\Auth::user()->level->nama == "Masyarakat") ? true : false;}
}
