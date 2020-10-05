<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;
    public function chitietdathang(){
    	return $this->hasMany('App\ChiTietDatHang','id_sanpham','id');
    }
}
