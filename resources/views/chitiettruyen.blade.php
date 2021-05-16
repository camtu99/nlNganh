@extends('layouttruyen')
@section('content')
<div class="container">
  <div class="tennd">
    <p>Truyện <i class="fa fa-angle-right" aria-hidden="true">{{$truyen[0]->ten_truyen}} </i></p>
  </div>
  <div class="thong_tin">
    <div class="row">
      <div class="col-lg-9">
        <div id="thongtintruyen" class="thong-tin-1">
          <div class="thong-tin-1-1">
            <div class="detail_img" style="margin: 20px;">
              <img src="http://127.0.0.1:8000/hinhanh/<?php echo $truyen[0]->hinh_anh;?>" alt="" style="width: 200px;height: 240px;"> 
            </div>
            <div class="detail_product">
              <h2>{{$truyen[0]->ten_truyen}}</h2>
              <div class="view-sach" style="display:flex;font-weight:100">
                <p class="iconct"> <i class="fa fa-eye" aria-hidden="true" style="font-weight: 100;">{{$truyen[0]->luot_doc}}</i></p>
                <p class="iconct">   <i class="fa fa-comment" aria-hidden="true" style="font-weight: 100;">0</i></p>
              </div>
              <p>Tên tác giả: <a href="/tacgia/{{$truyen[0]->ten_tac_gia}}">{{$truyen[0]->ten_tac_gia}}</a></p>
              <p>Mới nhất: <a href="/truyen/{{$truyen[0]->ten_truyen}}/{{$chuongmoi[0]->ten_chuong}}">{{$chuongmoi[0]->ten_chuong}}</a></p>   
              <p>Thời gian đổi mới: {{$mucluc[0]->thoi_gian}}</p>
              <p>Tình trạng: <a href="/trangthai/{{$truyen[0]->tinh_trang}}">{{$truyen[0]->tinh_trang}}</a></p>                           
            </div>
          </div>
          <div class="thong-tin-1-2">
            <div>
              <p> Thể loại :&nbsp
                @foreach ($theloai as $loai)
                  <a href="/theloai/{{$loai->ten_the_loai}}">{{$loai->ten_the_loai}}</a>
                @endforeach                                
              </p>
            </div>
            <div>
              <p>Chia sé: <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup"><i class="fab fa-facebook-square">Facebook</i></a>     <a href="https://twitter.com/share?url={{url()->current()}}&display=popup"><i class="fab fa-twitter-square"></i>Twitter</a></p>
            </div>
            <div>
              <?php echo $gioithieu;?>
            </div>
            <div style="display: flex;padding:10px;">
              <div class="name1-1">
                <a href="#mucluc" class="name1"><i class="fas fa-th-list"></i></a>
                <a href="#comment" class="name1"><i class="fas fa-comments"></i></a>
                <a href="/review/truyen/{{$truyen[0]->ten_truyen}}" class="name1">Review</a>
              </div>
              <div class="name1-2">
                <p class="name2" data-toggle="modal" data-target="#baoloi"type="button"><i class="fas fa-exclamation"></i></p>
                @if ($truyen[0]->user_id==Session::get('id_tk'))
                <div >
                  <div class="dropdown">
                    <p class="name2" type="button" data-toggle="dropdown"><i class="fas fa-users"></i>
                    </p>
                    <ul class="dropdown-menu">
                      <p data-toggle="modal" data-target="#trang-thai"type="button">Thay đổi trạng thái</p>
                      <p  data-toggle="modal" data-target="#the-loai"type="button">Thay đổi thể loại</p>
                    </ul>
                  </div>
                </div>                  
                @endif
                @if (Session::has('id_tk'))
                  <div>
                    <div class="dropdown">
                      <p class="name2" type="button" data-toggle="dropdown"><i class="fas fa-plus"></i>
                      </p>
                      <ul class="dropdown-menu">
                        @if($thuvien)
                            @foreach ($thuvien as $tv)
                                <p style="text-align: center"><a style="color: black;" href="/thuvien/themtruyen/{{$tv->id_thu_vien}}/{{$truyen[0]->truyen_id}}">{{$tv->ten_thu_vien}}</a></p>
                            @endforeach
                        @endif
                        <p style="text-align: center" data-toggle="modal" data-target="#add-ds"type="button">Tạo danh sách đọc</p>
                      </ul>
                    </div>
                  </div>
                @else
                <p class="name2" type="button" onclick="baoloi()"><i class="fas fa-plus"></i>
                @endif

                <p  type="button"  class="name2" style="color: white;"><a href="{{$truyen[0]->truyen_id}}/{{$mucluc[0]->ten_chuong}}"style="color: white;">Đọc</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3" style="padding-left: 0;">
        <div id="cungloai" class="right">
          <div id="cungtheloai" class="right1">
            <ul id="hihi" style="overflow: scroll; height: 761.6px;">
              <li><p>Cùng thể loại </p></li>
              @isset($cung_tacgia)
                @if ($soluong!=1)
                  @foreach ($cung_tacgia as $cung_tg)
                    @if ($cung_tg->truyen_id!=$truyen[0]->truyen_id)
                      <li>
                        <div class="rr">
                          <a href="">
                              <img src="http://127.0.0.1:8000/hinhanh/{{$cung_tg->hinh_anh}}" alt="">
                          </a>
                          <div class="rrr">
                              <p class="ts"><a href="/truyen/{{$cung_tg->truyen_id}}">{{$cung_tg->ten_truyen}}</a></p>
                              <p class="tacgia"><a href="timkiem.php?tacgia=TG2"><?php echo $truyen[0]->ten_tac_gia;?></a></p>
                              <p class="tinhtrang"><a href="timkiem.php?tinhtrang=Hoàn thành">{{$cung_tg->tinh_trang}}</a></p>
                          </div>
                        </div>
                      </li>
                    @endif
                  @endforeach
                @endif   
              @endisset
              @isset($cung_loaitruyen)
                @foreach ($cung_loaitruyen as $cung_loai)
                @if ($cung_loai->truyen_id!=$truyen[0]->truyen_id)
                  <li>
                    <div class="rr">
                      <a href="">
                          <img src="http://127.0.0.1:8000/hinhanh/{{$cung_loai->hinh_anh}}" alt="">
                      </a>
                      <div class="rrr">
                          <p class="ts"><a href="/truyen/{{$cung_loai->truyen_id}}">{{$cung_loai->ten_truyen}}</a></p>
                          <p class="tacgia"><a href="timkiem.php?tacgia=TG2">{{$cung_loai->ten_tac_gia}}</a></p>
                          <p class="tinhtrang"><a href="timkiem.php?tinhtrang=Hoàn thành">{{$cung_loai->tinh_trang}}</a></p>
                      </div>
                    </div>
                  </li>
                @endif  
                @endforeach
              @endisset
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="nguoidang">
    <div style="    padding: 10px;text-align: center;">
      <p style="margin: 0">Người đăng</p>
      <a href="/user/{{$truyen[0]->email}}" style="color: black">
        @if (substr_count($truyen[0]->avatar,'http')>0)
          <img src="{{$truyen[0]->avatar}}" alt="" style=" width: 90px;height: 90px;border-radius: 50%;margin: 5px">
        @else
          <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$truyen[0]->avatar}}" alt="" style=" width: 90px;height: 90px;border-radius: 50%;margin: 5px">
        @endif
        <p>{{$truyen[0]->name}}</p>
      </a>
    </div>
  </div>
  <div id="mucluc" class="mucluc">
    <div class="mucluc1">
      Mục Lục
    </div>
    <div class="mucluc2">
      <ul>
        @foreach ($mucluc as $item)
          <li class="mucluc2-2"><a href="{{$truyen[0]->truyen_id}}/{{$item->ten_chuong}}"><?php echo $item->ten_chuong;?></a></li>
        @endforeach
        
      </ul> 
      {{$mucluc->links()}}         
    </div>
  </div>
  <div id="comment" class="binhluan">         
    <div class="nhanbinhluan">
      <p style="font-size: x-large;width:90%"><i class="fa fa-commenting" aria-hidden="true" style="color:orange"></i>&nbsp;<b>Bình luận</b></p>
      <p style="right: auto;">Xếp theo&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></p>
    </div>
    <div class="binhluan1">
      <i class="far fa-comment-dots" aria-hidden="true" style="font-size:100px;margin:auto;color:#c9c9c9"></i><p></p>
      <div class="binhluan1-1">
        <form action="xulibinhluan.php">
            <textarea name="message" style="width:100%; height:150px;"></textarea>
            <br>
            <input type="submit" style="float: right;">
        </form>
      </div>
    </div>
    @isset($binhluan)
      @foreach ($binhluan as $bl)
        <div class="listcmt">
          <div class="m-avatar">
            <div class="avatar">
                <img src="{{asset('/hinhanh/1617558780_cây đậu.jpg')}}" alt="">
            </div> 
          </div>
          <div class="comment">
            <div class="comment-box2">
                <div class="cmt-name">
                    <b>{{$bl->ten_thanh_vien}}</b>
                </div>
                <div class="cmt-nd">
                    <p>{{$bl->nd_binh_luan}}</p>       
                </div>
                <div class="cmt-rep">
                    <div style="margin-left: auto;">
                    <b>Cử báo</b>
                    <b>Trả lời</b>
                    </div>
                </div>
            </div>
            @foreach ($binhluan as $blcon)
              @if ($blcon->id_binh_luan_con==$bl->id_binh_luan)
                <div class="cmt-con">
                  <div class="m-avatar">
                    <div class="avatar">
                        <img src="{{asset('/hinhanh/1617558780_cây đậu.jpg')}}" alt="">
                    </div> 
                  </div>
                  <div class="comment-box3">
                    <div class="cmt-name">
                        <b>{{$blcon->ten_thanh_vien}}</b>
                    </div>
                    <div class="cmt-nd">
                        <p>{{$blcon->nd_binh_luan}}</p>       
                    </div>
                    <div class="cmt-rep">
                        <div style="margin-left: auto;">
                        <b>Cử báo</b>
                        <b>Trả lời</b>
                        </div>
                    </div>
                  </div>
                </div>
              @endif 
            @endforeach
          </div>
        </div> 
      @endforeach 
    @endisset
   
  </div>  
</div>
@if (Session::has('id_tk'))
  <div class="modal fade" id="baoloi" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tôi muốn báo lỗi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="/baoloi/{{$truyen[0]->truyen_id}}" method="post">
            @csrf
            <textarea name="baoloi" id="" style="width:100%;" rows="10" placeholder="Lý do báo lỗi ..."></textarea>
        </div>
        <div class="modal-footer">
        @if (Session::has('id_tk'))
        <button type="submit" class="btn btn-success">Đồng ý</button>
        </form> 
        @else
        <p onclick="baoloi()"  class="btn btn-success">Đồng ý</p>
        @endif
        </div>
      </div>  
    </div>
  </div>
  <div class="modal fade" id="add-ds" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content" style="    width: 280px;">
        <div class="modal-body" style="text-align: center">
          <form action="/thuvien/them/" method="post">
            @csrf
            <label for="">Tên:</label>
            <input type="text" name="danhsachdoc">
    
        <button class="themds" type="submit">Thêm</button>
        <button type="button"class="themds" data-dismiss="modal">Hủy</button></form> 
        </div>
      </div>  
    </div>
  </div>
  @if ($truyen[0]->user_id==Session::get('id_tk'))
    <div class="modal fade" id="trang-thai" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="    width: 500px;">
          <div class="modal-body" style="text-align: center">
            <form action="/suatruyen/{{$truyen[0]->truyen_id}}/" method="post">
              @csrf
              <div style="display: flex;padding: 20px;">
                <div class="form-check" style="margin: auto">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"name="tinhtrang"  value="Hoàn thành">Hoàn Thành
                  </label>
                </div>
                <div class="form-check"style="margin: auto">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"name="tinhtrang"  value="Còn tiếp">Còn tiếp
                  </label>
                </div>
                <div class="form-check"style="margin: auto">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="tinhtrang" value="Tạm ngưng">Tạm ngưng
                  </label>
                </div>
              </div>
          <button class="themds" type="submit">Thay đổi</button>
          <button type="button"class="themds" data-dismiss="modal">Hủy</button></form> 
          </div>
        </div>  
      </div>
    </div>
    <div class="modal fade" id="the-loai" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="    width: 280px;">
          <div class="modal-body" style="text-align: center">
            <form action="/suatruyen/theloai/{{$truyen[0]->truyen_id}}/" method="post">
              @csrf
              <div>
                @if ($dstheloai)
                  @foreach ($dstheloai as $ds)
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="{{$ds->the_loai_id}}" value="{{$ds->the_loai_id}}">{{$ds->ten_the_loai}}
                      </label>
                    </div>  
                  @endforeach
                @endif
              </div>
          <button class="themds" type="submit">Thay đổi</button>
          <button type="button"class="themds" data-dismiss="modal">Hủy</button></form> 
          </div>
        </div>  
      </div>
    </div>
  @endif
@endif
@endsection