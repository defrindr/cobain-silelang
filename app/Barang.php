<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function petugas(){
    	return $this->belongsTo('App\Petugas','id_petugas','id');
    } 
}
