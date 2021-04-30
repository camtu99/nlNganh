@extends('layoutuser')
    @section('content')
        <div style="background-color: white;padding: 40px;">
            <div style="margin-bottom: 10px;">
                <i style="color: #ffc107;" class="fa fa-comment" aria-hidden="true"> Review</i>
            </div>
            <div class="list-review">
                @foreach ($review as $item)
                    <div class="group-review">
                        <div class="avater-review">
                            <img src="http://www.elle.vn/wp-content/uploads/2017/07/25/hinh-anh-dep-1.jpg" alt="">
                        </div>
                        <div class="khung-review">
                            <p style="font-size:20px; font-weight: bold;color:#27c6da">{{$user[0]->name}}</p>
                            <div>
                                {{$item->nd_review}}
                            </div>
                            <div class="r123" style="display:flex">
                                <p style="margin-right:10px;margin-left: auto;">Cử báo</p>
                                <p >Trả lời</p>
                            </div>
                        </div>
                        <div class="decu">
                            <img src="http://127.0.0.1:8000/hinhanh/{{$item->hinh_anh}}" alt="">
                            <p style="font-weight: bold;font-size: 13px;">{{$item->ten_truyen}}</p>
                            <p style="font-size: 10px;">{{$item->ten_tac_gia}}</p>
                            <p style="font-size: 11px;"><i class="fa fa-eye" aria-hidden="true">{{$item->luot_doc}}  lượt đọc</i></p>
                        </div>
                    </div>
                @endforeach       
            </div>
        </div>
    @endsection
    

