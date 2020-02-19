<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryLelang extends Model
{
	public function lelang(){
		return $this->belongsTo('App\Lelang','id_lelang','id');
	} 
	public function barang(){
		return $this->belongsTo('App\Barang','id_barang','id');
	} 
	public function masyarakat(){
		return $this->belongsTo('App\Masyarakat','id_masyarakat','id');
	} 
}
