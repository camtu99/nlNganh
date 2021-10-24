<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TheLoai extends Model
{
    protected $table = "the_loai";

    public function tag_truyen(){
        return $this -> hasMany('App\TagTruyen','the_loai_id','the_loai_id');
    }

    public function get_all_theloai(){
        $theloai = DB::table('the_loai')
                        ->get();
        return $theloai;
    }
    
}
