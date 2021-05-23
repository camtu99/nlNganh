@extends('layouttruyen')
@section('content')
    <div style="background-color:rgb(115 223 247 / 27%);padding: 50px 30px;">
        <div style="    padding:35px;margin:10px; background-color: white;">Bạn vừa đọc xong một truyện cực hay muốn giới thiệu cho nhiều người cùng đọc, hoặc vừa bỏ một mớ thời gian oan uổng ra đọc một truyện cực dở, muốn cảnh báo mọi người đừng nhảy hố.... Mời bạn viết cảm nhận, đánh giá, spoil, trích đoạn vào đây để mọi người có thêm sự tham khảo khi chọn truyện đọc.</div>
        <div >
            <form action="reviewtruyen" method="post">
                @csrf
                <div style="padding: 5px;margin:10px;">
                    <span>Nhập link review:</span>
                    <input type="url" name="linkreview" style="width: 84%;">
                </div>
                <div style="padding: 5px;margin:10px;">
                    <textarea style="width: 100%;" name="noidungreview" id="" cols="30" rows="10"></textarea>
                </div>
                @if(Session::has('email_tk'))
                    <div style="text-align: center;margin:10px;"><button style="width:150px"  type="submit" class="btn btn-success">review</button></div>
                @else
                    <div style="text-align: center;margin:10px;"><p data-toggle="modal" data-target="#dangnhap" style="width:150px" class="btn btn-success">review</p></div>
                @endif
            </form>
        </div>
        <div>
            <div style="background-color: white;padding: 20px;margin-top: 40px;">
                <div style="margin-bottom: 10px;">
                    <i style="color: #ffc107;" class="fa fa-comment" aria-hidden="true"> Review</i>
                </div>
                <div class="list-review">
                    @foreach ($review as $item)
                        <div class="group-review">
                            <div class="avater-review" style="width: 10%;">
                                @if (substr_count($item->avatar,'http')>0)
                                    <img src="{{$item->avatar}}" alt="" >
                                @else
                                    <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$item->avatar}}" alt="" >
                                @endif
                            </div>
                            <div  style="width: 73%;">
                                <div class="khung-review">
                                    <p style="font-size:20px; font-weight: bold;color:#27c6da">{{$item->name}}</p>
                                    <div>
                                        {{$item->nd_review}}
                                    </div>
                                    @if (Session::has('id_tk'))
                                        <div class="r123" style="display:flex">
                                            <div style="margin-left: auto;margin-right:10px;" class="dropdown  dropright">
                                                <p type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                    Cử báo
                                                </p>
                                                <div class="dropdown-menu">
                                                    <label>Lý do cử báo:</label>
                                                  <a class="dropdown-item" href="/review/cubao/{{$item->id}}/{{$item->id_review}}/chinhtri">Đề cập đến chính trị</a>
                                                  <a class="dropdown-item" href="/review/cubao/{{$item->id}}/{{$item->id_review}}/chuiboi">Chửi bới, sỉ nhục thành viên khác</a>
                                                  <a class="dropdown-item" href="/review/cubao/{{$item->id}}/{{$item->id_review}}/chuithe">Chửi thề nói tục</a>
                                                  <a class="dropdown-item" href="/review/cubao/{{$item->id}}/{{$item->id_review}}/saisuthat">Quảng bá thông tin sai sự thật</a>
                                                  <a class="dropdown-item" href="/review/cubao/{{$item->id}}/{{$item->id_review}}/lamdung">Lạm dụng ngôn ngữ chat</a>
                                                </div>
                                              </div>                                           
                                            <p type='button' data-toggle="collapse" data-target="#traloi{{$item->id_review}}"> Trả lời </p>
                                        </div>
                                    @else
                                        <div class="r123" style="display:flex">
                                            <p  type='button' data-toggle="modal" data-target="#dangnhap"style="margin-right:10px;margin-left: auto;">Cử báo</p>
                                            <p type='button' data-toggle="modal" data-target="#dangnhap"> Trả lời </p>
                                        </div>
                                    @endif                                    
                                </div>
                                <div id="traloi{{$item->id_review}}" class="collapse">
                                    <div style="display: flex; width: 100%;padding: 20px 0 20px 10px;">
                                        <div class="avater-review">
                                            @if (Session::has('avatar_tk'))
                                            <img src="{{Session::get('avatar_tk')}}" alt="">
                                           @else
                                            <img src="http://127.0.0.1:8000/hinhanh/avatar/{{Session::get('avatar_tk')}}" alt="" >
                                           @endif
                                        </div>
                                        <div style="width: 100%;">
                                            <form action="/review/binhluan/{{Session::get('id_tk')}}/{{$item->id_review}}" method="post">
                                                @csrf
                                                <textarea name="traloi" id="" cols="30" rows="10" style="    width: 100%;"></textarea>
                                                <button>Trả lời</button>
                                            </form>                           
                                        </div>
                                    </div>
                                </div>
                                @foreach ($binhluan as $bl)
                                   @if ($bl->id_review==$item->id_review)
                                        <div style="display: flex;padding: 20px 0 20px 10px;">
                                            <div class="avater-review">
                                                @if (substr_count($bl->avatar,'http')>0)
                                                    <img src="{{$bl->avatar}}" alt="" >
                                                @else
                                                    <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$bl->avatar}}" alt="" >
                                                @endif
                                            </div>
                                            <div class="khung-review">
                                                <p style="font-size:20px; font-weight: bold;color:#27c6da">{{$bl->name}}</p>
                                                <div>
                                                    {{$bl->nd_binh_luan}}
                                                </div>
                                                @if (Session::has('id_tk'))
                                                    <div class="r123" style="display:flex">
                                                        <div style="margin-left: auto;margin-right:10px;" class="dropdown  dropright">
                                                            <p type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                                Cử báo
                                                            </p>
                                                            <div class="dropdown-menu">
                                                                <label>Lý do cử báo:</label>
                                                              <a class="dropdown-item" href="binhluan/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chinhtri">Đề cập đến chính trị</a>
                                                              <a class="dropdown-item" href="binhluan/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chuiboi">Chửi bới, sỉ nhục thành viên khác</a>
                                                              <a class="dropdown-item" href="binhluan/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chuithe">Chửi thề nói tục</a>
                                                              <a class="dropdown-item" href="binhluan/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/saisuthat">Quảng bá thông tin sai sự thật</a>
                                                              <a class="dropdown-item" href="binhluan/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/lamdung">Lạm dụng ngôn ngữ chat</a>
                                                            </div>
                                                          </div>                                           
                                                        <p type='button' data-toggle="collapse" data-target="#traloi{{$item->id_review}}"> Trả lời </p>
                                                    </div>
                                                @else
                                                    <div class="r123" style="display:flex">
                                                        <p  type='button' data-toggle="modal" data-target="#dangnhap"style="margin-right:10px;margin-left: auto;">Cử báo</p>
                                                        <p type='button' data-toggle="modal" data-target="#dangnhap"> Trả lời </p>
                                                    </div>
                                                @endif                                    
                                            </div>
                                        </div> 
                                   @endif 
                                @endforeach
                            </div>
                            <div class="decu" style="width: 17%;">
                                <a href="/truyen/{{$item->truyen_id}}" style="color: black">
                                    <img src="http://127.0.0.1:8000/hinhanh/{{$item->hinh_anh}}" alt="">
                                    <p style="font-weight: bold;font-size: 13px;">{{$item->ten_truyen}}</p>
                                    <p style="font-size: 10px;">{{$item->ten_tac_gia}}</p>
                                    <p style="font-size: 11px;"><i class="fa fa-eye" aria-hidden="true">{{$item->luot_doc}}  lượt đọc</i></p>
                                </a>                              
                            </div>
                        </div>
                    @endforeach       
                </div>
                <div>{{$review->links()}} </div> 
            </div>
        </div>
    </div>
@endsection