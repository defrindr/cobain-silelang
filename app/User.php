<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as UserModel;

class User extends UserModel
{
	protected $fillable = [
		"username",
		"password",
		'id_level'
	];

	public function petugas(){
		return $this->hasOne('App\Petugas','id_user','id');
	} 
	public function masyarakat(){
		return $this->hasOne('App\Masyarakat','id_user','id');
	} 
	public function level(){
		return $this->belongsTo('\App\Level','id_level','id');
	}
}
