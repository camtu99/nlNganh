
@extends('layoutuser')
@section('content')

    <div class="container" id="gioithieu">
        <div class="row">
            <div class="gioithieu">
                <div class="col-md-4">
                    <div class="cot-trai">
                        <div class="thongtinthanhvien">
                             {{$user[0]->thongtin}}
                        </div>
                        <div class="ngaythamgia">
                            <p><b>Tham gia ngày: {{$user[0]->created_at}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @isset($noidung)
                        @foreach ($noidung as $item) 
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
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection