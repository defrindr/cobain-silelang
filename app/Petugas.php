<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
	protected $table = 'petugas';


	protected $fillable = [
		"nama",
		"alamat",
		"id_user",
		"nip",
		"photo"
	];

	public function user(){
		return $this->belongsTo('App\User','id_user','id');
	} 
	public function lelang(){
		return $this->hasMany('App\Lelang');
	} 
	public function barang(){
		return $this->hasMany('App\Barang');
	} 
}
