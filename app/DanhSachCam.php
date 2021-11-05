<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DanhSachCam extends Model
{
    protected $table = "danh_sach_cam";
    public $timestamps = false;
    public function cam_nhung(){
        $cam = DB::table('danh_sach_cam')
        ->paginate(20);
        return $cam;
    }
    public function timtenhoc($ten){
        $cam = DB::table('danh_sach_cam')
                ->where('ten','like','%'.$ten.'%')
                ->paginate(20);              
                return $cam;
    }

    public function create($ten,$tacgia){
        DB::table('danh_sach_cam')
            ->insert([
                'ten'=>$ten,
                'tac_gia'=>$tacgia
            ]);
    }
}
