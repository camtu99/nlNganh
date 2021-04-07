<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagTruyen extends Model
{
    protected $table = "tag_truyen";
    public $timestamps = false;
    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }

    public function the_loai(){
        return $this -> belongsTo('App\TheLoai','the_loai_id','the_loai_id');
    }

    public function add_tagtruyen($id,$theloai){
        DB::table('tag_truyen')
            ->insert(
                [
                'truyen_id'=>$id,
                'the_loai_id'=>$theloai
                ]
            );
    }
}
