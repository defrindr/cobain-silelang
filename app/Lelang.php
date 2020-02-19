<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
	public function lelang(){
		return $this->hasMany('App\Lelang');
	} 
	
	public function historylelang(){
		return $this->HasMany('App\HistoryLelang','id_lelang','id');
	} 
	public function barang(){
		return $this->belongsTo('App\Barang','id_barang','id');
	} 
	public function masyarakat(){
		return $this->belongsTo('App\Masyarakat','id_masyarakat','id');
	} 
	public function petugas(){
		return $this->belongsTo('App\Petugas','id_petugas','id');
	} 
}
