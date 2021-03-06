@extends('layouttruyen')
@section('content')
    <div style="padding: 50px 30px;background-color:white">
        @isset($tacgia)
        <div>
            <p style="background-color: #76e4f9;text-align: center;font-weight: 700;font-size: 25px;font-family: cursive;">Danh sách tác giả</p>
        </div>
        <div>           
            <ul class="tacgia_ds">
                @foreach ($tacgia as $tg)
                   <li>
                        <div  style="display: flex;width:600px;margin:auto;">
                            <b style="margin:auto 0;margin-right: auto"><a style="color: black" href="{{$tg->ten_tac_gia}}">{{$tg->ten_tac_gia}}</a></b>
                            <p style="margin: auto 0">{{$tg->sotruyen}} truyện</p>
                        </div>   
                   </li>          
                @endforeach 
            </ul>
            <div style="padding-top: 20px;">{{$tacgia->links()}}</div>
        </div>        
        @endisset
        @isset($thanhvien)
        <div>
            <p style="background-color: #76e4f9;text-align: center;font-weight: 700;font-size: 25px;font-family: cursive;">Danh sách thành viên</p>
        </div>
        <div>
            <ul class="tacgia_ds">
                @foreach ($thanhvien as $tg)
                   <li>
                        <div  style="display: flex;width:600px;margin:auto;">
                            <b style="margin:auto 0;margin-right: auto"><a style="color: black" href="{{$tg->name}}">{{$tg->name}}</a></b>
                            <p style="margin: auto 0">{{$tg->thanh_tich}} tích phân</p>
                        </div>   
                   </li>          
                @endforeach 
            </ul>
            <div style="padding-top: 20px;">{{$thanhvien->links()}}</div>
        </div>       
        @endisset
    </div>
@endsection