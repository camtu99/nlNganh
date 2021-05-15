@extends('layoutuser')
@section('content')
    <div>
        @if ($truyen)
            @foreach ($truyen as $item)
            <div class=" thongtin2" style="display: flex;">
                <div class="">
                    <img src="http://127.0.0.1:8000/hinhanh/{{$item->hinh_anh}}" alt="{{$item->ten_truyen}}">
                </div>
                <div style="width:100%">
                    <div class="thongtin12">
                        <p style="font-weight: bold; font-size: 20px;margin-bottom: 5px;">{{$item->ten_truyen}}</p>
                        <p>{{$user[0]->name}}</p>
                        <p>Tác giả: <Span style="color:#8eedf9;">{{$item->ten_tac_gia}}</Span></p>
                        <p>Tình trạng: <Span style="color:#8eedf9;">{{$item->tinh_trang}}</Span></p>
                        <p>Lượt đọc : {{$item->luot_doc}}  lần</p>
                    </div>
                    <div class="doc" style="display: flex;">
                        <p style="margin-left: auto;">Đọc</p>
                        <p >+</p>
                    </div>
                </div>  
            </div>
            @endforeach
        @else
            Rỗng
        @endif
    </div>
@endsection