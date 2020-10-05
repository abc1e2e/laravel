<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatHang extends Model
{
    protected $table = "chitietdathang";

    public function sanpham(){
    	return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function dathang(){
    	return $this->belongsTo('App\DatHang','id_dathang','id');
    }
     public $timestamps = false;
}
