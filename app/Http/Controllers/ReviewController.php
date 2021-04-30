<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Follow;
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
        return view('review',compact('user','follower','following','review'));
    }
}
