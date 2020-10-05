<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{   
    protected $table = "khachhang";

    public function dathang(){
    	return $this->hasMany('App\DatHang','id_khachhang','id');
    }
	 public $timestamps = false;
    // /**
}

