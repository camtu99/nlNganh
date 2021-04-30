<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThuVien extends Model
{
    protected $table = "thu_vien";



    public function thanh_vien(){
        return $this -> belongsTo('App\User','user_id','id');
    }
    public function get_thuvien($id){
        $thuvien = DB::table('thu_vien')
            ->where('user_id','=',$id)
            ->get();
        return $thuvien;
    }
}
