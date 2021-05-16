@extends('layoutuser')
@section('content')
    <div>
        <div>
            <h3>Đánh dấu chương</h3>
        </div>
        <div class="">
            @if ($bookmark)
                @foreach ($bookmark as $item)
                    <div class="bookmark-list">
                        <div>
                            <img src="http://127.0.0.1:8000/hinhanh/{{$item->hinh_anh}}" alt="">
                        </div>
                        <div style="padding: 2px 15px;">
                            <a href="/truyen/{{$item->truyen_id}}/{{$item->ten_chuong}}">
                                <p class="teude" > {{$item->ten_truyen}}</p>
                                <p>Tác giả: {{$item->ten_tac_gia}}</p>
                                <p>Chương:  <span>{{$item->ten_chuong}}</span></p>
                            </a>        
                        </div>
                        <div class="btn-xoa">
                            <a type="button"  class="btn btn-light"href="/bookmark/xoa/{{$item->id_bookmark}}">Xóa</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h4>Rỗng</h4>
            @endif    
        </div>
    </div>
@endsection

