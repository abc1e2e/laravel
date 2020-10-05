<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
    protected $table = "dathang";

    public function chitietdathang(){
    	return $this->hasOne('App\ChiTietDatHang','id_dathang','id');
    }

    public function khachhang(){
    	return $this->belongsTo('App\KhachHang','id_khachhang','id');
    }
   
   
    // public function users(){
    // 	return $this->belongsTo('App\User','id_shipper','id');
    // }
    public $timestamps = false;
}
