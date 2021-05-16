@extends('layoutuser')
@section('content')  
  <div style="text-align: center;">
      Danh sách đọc
  </div>
  <div id="accordion">
    @isset($thuvien)
      @foreach ($thuvien as $loaitv)
        <div class="card">
          <div class="card-header"style="text-align: center;">
            <a class="card-link" data-toggle="collapse" href="#collapse{{$loaitv->id_thu_vien}}" >
              {{$loaitv->ten_thu_vien}}
            </a>
          </div>
          <div id="collapse{{$loaitv->id_thu_vien}}" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <div style="display: flex;flex-wrap: wrap;width:100%">
                @foreach ($truyentv as $truyenct)
                  @if ($truyenct->id_thu_vien==$loaitv->id_thu_vien)
                  <a href="/truyen/{{$truyenct->truyen_id}}" style="color: black">
                    <div class="hin">
                      <img src="http://127.0.0.1:8000/hinhanh/{{$truyenct->hinh_anh}}" style="width: 165px; height: 250px;" alt="">
                      <p class="tentruyentv"  data-toggle="tooltip" data-placement="left" title="{{$truyenct->ten_truyen}}">{{$truyenct->ten_truyen}}</p>
                      <p>{{$truyenct->ten_tac_gia}}</p>
                      <p>{{$truyenct->tinh_trang}}</p>
                      <p>{{$truyenct->luot_doc}} lượt đọc </p>
                    </div>
                  </a>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>  
      @endforeach  
    @endisset
  </div>
@endsection