<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = "review";

    public function truyen(){
        return $this -> belongsTo('App\Truyen','truyen_id','truyen_id');
    }

    public function thanh_vien(){
        return $this -> belongsTo('App\User','id','user_id');
    }

    public function cu_bao_user(){
        return $this -> hasMany('App\CuBaoUers','id_review','id_review');
    }
     public function get_review($id){
         $review = DB::table('review')
                    ->join('truyen','truyen.truyen_id','=','review.truyen_id')
                    ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->where('review.user_id','=',$id)
                    ->get();
                    return $review;
     }
     public function all_review(){
         $review = DB::table('review')
             ->join('truyen','truyen.truyen_id','=','review.truyen_id')
             ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
             ->join('users','users.id','=','review.user_id')
             ->orderBy('ngay_rv','desc')
             ->where('tinh_trang_rv','=','ok')
             ->paginate(2);
             return $review;

     }

     public function add_review($id,$id_user,$nd){
         DB::table('review')
            ->insert([
                'truyen_id'=>$id,
                'user_id'=>$id_user,
                'nd_review'=>$nd
            ]);
            $tichphan=DB::table('users')
            ->where('id','=',$id_user)
            ->get();
        $cong = $tichphan[0]->thanh_tich + 3;
        $congtichphan = DB::table('users')
                            ->where('id','=',$id_user)
                            ->update(['thanh_tich'=>$cong]); 
     }
     public function get_review_truyen($id_truyen){
         $review = DB::table('review')
                    ->join('truyen','truyen.truyen_id','=','review.truyen_id')
                    ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
                    ->join('users','users.id','=','review.user_id')
                    ->where('review.truyen_id','=',$id_truyen)
                    ->orderBy('ngay_rv','desc')
                    ->paginate(2);
                    return $review;
     }
     public function top_review($ngay){
         $review =  DB::select("SELECT date(`ngay_rv`) as ngay,COUNT(DAY(`ngay_rv`)) AS sl_review FROM `review` WHERE MONTH(`ngay_rv`)= ".$ngay." GROUP BY `ngay_rv`");
         return $review;
     }
     public function get_rv_id($id){
        $review = DB::table('review')
        ->join('truyen','truyen.truyen_id','=','review.truyen_id')
        ->join('tac_gia','tac_gia.tac_gia_id','=','truyen.tac_gia_id')
        ->join('users','users.id','=','review.user_id')
        ->where('id_review','=',$id)
        ->paginate(2);
        return $review;

     }
     public function xoareview($id){
         
         DB::select('UPDATE `review` SET`tinh_trang_rv`= '."'no'".' WHERE `id_review`= ?', [$id]);
     }
     
}
