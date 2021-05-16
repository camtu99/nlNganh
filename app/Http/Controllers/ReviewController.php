<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Follow;
use App\Truyen;

class ReviewController extends Controller
{
    public function get_review(){
        $review = new Review();
        $review = $review ->all_review();
        $binhluan = new BinhLuan();
        $binhluan = $binhluan ->bl_review();
        return view('review_truyen',compact('review','binhluan'));
    }
    public function insert_review(Request $req){
        $link = $req->linkreview;
        $noidung = $req->noidungreview;
        $id = substr($link,29);
        $id_user = Session::get('id_tk');
        $review = new Review();
        $review = $review->add_review($id,$id_user,$noidung);
        Session::flash('success','Đã thêm review thành công');
        return redirect()->back();
    }
    public function check_follow($follower){
        $check = 'no';
        if(Session::get('id_tk')){
            foreach ($follower as  $follow) {
                if($follow->id==Session::get('id_tk')) {
                    $check = 'ok';
                    return $check;
                }
            }
        }
        return $check;
    }
    public function review($name){
        $user = new User();
        $user = $user ->get_id($name);
        $id = $user[0]->id;
        $follower = new Follow();
        $follower = $follower->get_follower($id);
        $following = new Follow();
        $following = $following->get_following($id);
        $review = new Review();
        $review = $review->get_review($id);
        $follow = $this->check_follow($follower);
        return view('review',compact('user','follower','following','review','follow'));
    }
    public function review_truyen($name){
        $truyen = new Truyen();
        $truyen = $truyen->get_ten_truyen($name);
        $truyen_id = $truyen[0]->truyen_id;
        $review = new Review();
        $review = $review->get_review_truyen($truyen_id);
        $binhluan = new BinhLuan();
        $binhluan = $binhluan ->bl_review();
        if($review!=''){
            return view('review_truyen',compact('review','binhluan'));
        }else{
        Session::flash('error','Truyện chưa có review');
        return redirect()->back();
        }
    }
}
