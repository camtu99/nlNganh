<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Follow extends Model
{
    protected $table = "follow";

    public function follower(){
        return $this -> BelongsTo('App\ThanhVien','follower_id','follow_id');
    }

    public function following(){
        return $this -> BelongsTo('App\ThanhVien','following_id','follow_id');
    }
}
