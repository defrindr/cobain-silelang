<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
	protected $fillable = [
		"username",
		"nama",
		"alamat",
		"photo",
		"id_user"
	];

	public function user(){
		return $this->belongsTo('App\User','id_user','id');
	} 
	public function lelang(){
		return $this->hasMany('App\Lelang');
	} 
	public function historyLelang(){
		return $this->hasMany('App\HistoryLelang');
	} 
}
