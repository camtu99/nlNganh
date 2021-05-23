<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    protected $table = "topic";

    public function get_topic_qc(){
        $topic = DB::table('topic')
                ->where('the_loai_topic','=','Quảng cáo')
                ->get();
                return $topic;
    }
    public function get_topic_thongbao(){
        $topic = DB::table('topic')
                    ->where('the_loai_topic','=','Thông Báo')
                    ->get();
                    return $topic;
    }
    public function update_qc($ten,$link,$anh){
        DB::table('topic')
                ->where('id_topic','=',1)
                ->update([
                    'ten_topic'=>$ten,
                    'link_topic'=>$link,
                    'hinh_anh_topic'=>$anh
                ]);
    }
    public function update_thongbao($id,$ten,$link){
        DB::table('topic')
                ->where('id_topic','=',$id)
                ->update([
                    'ten_topic'=>$ten,
                    'link_topic'=>$link
                ]);
    }
}
