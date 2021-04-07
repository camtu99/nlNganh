<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bookmarks extends Model
{
    protected $table = "bookmarks";

    public function thanh_vien(){
        return $this -> belongsTo('App\ThanhVien','user_id','id_bookmak');
    }

    public function noi_dung_chuong(){
        return $this -> belongsTo('App\NoiDungChuong','noi_dung_chuong_id','id_bookmark');
    }
}
