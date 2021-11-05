<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TruyCap extends Model
{
    protected $table = "truycap";
    public $timestamps = false;
    public function luot_doc(){
        return $this -> hasMany('App\Truyen','truyen_id','truyen_id');
    }
    public function truycap1($id){
        DB::insert('insert into truycap (truyen_id) values ( ?)',[$id]);
        
    }
    public function truycap(){
        return null;
    }
}
