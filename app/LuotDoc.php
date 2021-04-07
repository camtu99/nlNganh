<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LuotDoc extends Model
{
    protected $table = "luot_doc";

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','id_luot_doc');
    }

    public function get_luotdoc($id){
        $luotdoc= DB::table('luot_doc')
                    -> where('truyen_id','=',$id)
                    ->get()
                    ->count();
        if(!isset($luotdoc)){$luotdoc=0;}
        return $luotdoc;
    }
}
