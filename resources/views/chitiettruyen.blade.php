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
                @foreach ($theloaitruyen as $loai)
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
                             
                @if ($truyen[0]->user_id==Session::get('id_tk')||Session::has('tk_admin'))
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
                  <p class="name2" data-toggle="modal" data-target="#baoloi"type="button"><i class="fas fa-exclamation"></i></p> 
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
                  <p class="name2" data-toggle="modal" data-target="#cubaotruyen"type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></p>                                        
                @else
                <p class="name2" type="button" onclick="baoloi()"><i class="fas fa-exclamation"></i></p> 
                <p class="name2" type="button" onclick="baoloi()"><i class="fas fa-plus"></i>
                <p class="name2" type="button" onclick="baoloi()"><i class="fa fa-minus-circle" aria-hidden="true"></i>

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
  
  {{-- đánh giá sao --}}
  <div style="background-color: white;padding: 30px 0;    margin-top: 40px;">
    <h2 style="padding: 0 30px 20px;">Đánh giá và nhận xét {{$truyen[0]->ten_truyen}}</h2>
    <div class="row">
      <div class="col">
        <div class="c-rate__left text-center">
          <p>Đánh Giá Trung Bình</p>
          <div class="point-danh-gia">3/5</div>       
          <span>38 đánh giá &amp; 3 nhận xét</span>
        </div>
      </div>
      <div class="col-5">
        <div class="c-rate__center">
          <div class="c-progress-list">
            <div class="c-progress-item">
              <label>
                  5
                  <i class="demo-icon ye-star small icon-star"></i>
              </label>
              <div class="c-progress-bar">
                  <span class="c-progress-value" style="width: 21%;"></span>
              </div>
              <span>8</span>
            </div>
            <div class="c-progress-item">
              <label>
                  4
                  <i class="demo-icon ye-star small icon-star"></i>
              </label>
              <div class="c-progress-bar">
                <span class="c-progress-value" style="width: 21%;"></span>
              </div>
              <span>8</span>
            </div>
            <div class="c-progress-item">
              <label>
                  3
                  <i class="demo-icon ye-star small icon-star"></i>
              </label>
              <div class="c-progress-bar">
                <span class="c-progress-value" style="width: 26%;"></span>
              </div>
              <span>10</span>
            </div>
            <div class="c-progress-item">
              <label>
                  2
                  <i class="demo-icon ye-star small icon-star"></i>
              </label>
              <div class="c-progress-bar">
                <span class="c-progress-value" style="width: 18%;"></span>
              </div>
              <span>7</span>
            </div>
            <div class="c-progress-item">
              <label>
                  1
                  <i class="demo-icon ye-star small icon-star"></i>
              </label>
              <div class="c-progress-bar">
                  <span class="c-progress-value" style="width: 13%;"></span>
              </div>
              <span>5</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col" style="    margin: auto;">
        <div class="c-rate__right text-center">
            <p class="small-para">Bạn đã dùng sản phẩm này?</p>
            <button data-toggle="collapse" data-target="#guidanhgia">Gửi đánh giá của bạn</button>
        </div>
      </div>
    </div>
    <div id="guidanhgia" class="collapse">
      <div class="c-user-rate">
        <div class="row no-gutters">
          <div class="col">
            <div class="c-user-rate-star text-center">
              <p>Bạn chấm truyện này bao nhiêu sao?</p>
              <div class="stars">
                <form action="">
                  <input class="star star-5" id="star-5" type="radio" name="star"/>
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" name="star"/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="star"/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="star"/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="star"/>
                  <label class="star star-1" for="star-1"></label>
                </form>
              </div>
              <p class="f-err" style="display: none;">Vui lòng chọn đánh giá của bạn về truyện này</p>
            </div>
          </div>
          <div class="col-8">
            <div class="c-user-rate-form">
              <textarea name="a" id="txtReview" rows="4" placeholder="Bạn có khuyên người khác mua đọc truyện này không? Tại sao?"></textarea>
              <button class="btn btn-primary">Gửi đánh giá</button>
            </div>
          </div>
        </div>    
      </div>
    </div>
    <div>
       {{-- mục lục đánh giá sao --}}
    <div class="c-user-comment">     
      <div class="c-comment">
        <div class="c-comment-box">
          <div class="c-comment-box__avatar"><img style="    width: 70px;height: 70px;" src="https://hc.com.vn/i/ecommerce/media/ckeditor_3087086.jpg" alt=""></div>
          <div class="c-comment-box__content">
            <div class="c-comment-name">Bui Huu Thanh</div>
            <div class="list-star">
              <ul>
                <ul>
                  <li >
                    <i class="fas fa-star small ye-star icon-star"></i>
                  </li>
                  <li>
                    <i  class="fas fa-star small ye-star icon-star"></i>
                  </li>
                  <li >
                    <i class="fas fa-star small ye-star icon-star"></i>
                  </li>
                  <li >
                    <i  class="fas fa-star small ye-star icon-star non-star"></i>
                  </li>
                  <li >
                    <i class="fas fa-star small ye-star icon-star non-star"></i>
                  </li>
                </ul>
                <span>vào ngày 25/08/2021</span>
              </ul>
            </div>
            <div class="c-comment-text">Mình mới mua SS Note 20 Ultra, cổng USB type C rất chán, cắm tai nghe bị đứt kết nối liên tục, dây sạc nhanh bị hỏng mình phải đặt mua cáp mới, hệ điều hành android quá rối, quản lý hiệu năng kém nên tốn pin khá nhiều, nói chung không thể so với ip được</div>           
          </div>
        </div>
        <div class="c-comment-box">
          <div class="c-comment-box__avatar">M</div>
          <div class="c-comment-box__content">
            <div class="c-comment-name">Minh</div>
            <div class="list-star">
              <ul>
                <ul>
                  <li data-index="1"><i data-index="1" class="fas fa-star small ye-star "></i></li>
                  <li data-index="2"><i data-index="2" class="fas fa-star small ye-star "></i></li>
                  <li data-index="3"><i data-index="3" class="fas fa-star small ye-star "></i></li>
                  <li data-index="4"><i data-index="4" class="fas fa-star small ye-star "></i></li>
                  <li data-index="5"><i data-index="5" class="fas fa-star small ye-star "></i></li>
                </ul><span>vào ngày 18/06/2021</span>
              </ul>
            </div>
            <div class="c-comment-text">Mua tầm này là best price rồi ae. Quất thôi. </div>
          </div>
        </div>
        <div class="c-comment-box">
          <div class="c-comment-box__avatar">N</div>
          <div class="c-comment-box__content">
            <div class="c-comment-name">Nguyen</div>
            <div class="list-star">
              <ul>
                <ul>
                  <li data-index="1"><i data-index="1" class="fas fa-star  ye-star"></i></li>
                  <li data-index="2"><i data-index="2" class="fas fa-star ye-star"></i></li>
                  <li data-index="3"><i data-index="3" class="fas fa-star ye-star "></i></li>
                  <li data-index="4"><i data-index="4" class="fas fa-star small ye-star "></i></li>
                  <li data-index="5"><i data-index="5" class="fas fa-star small ye-star "></i></li>
                </ul><span>vào ngày 17/06/2021</span>
              </ul>
            </div>
            <div class="c-comment-text">Mình mới mua tại FPT Long Thành, nguyên seal luôn (nhân viên bóc dùm), thanh toán VNPay giảm thêm 500 ngàn. Giá tốt nhất để mua Note 20 Ultra chính hãng rồi các anh em.</div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  
 

  

  {{-- bình luận --}}
  <div id="comment" class="binhluan">         
    <div class="nhanbinhluan">
      <p style="font-size: x-large;width:90%"><i class="fa fa-commenting" aria-hidden="true" style="color:orange"></i>&nbsp;<b>Bình luận</b></p>
      <p style="right: auto;">Xếp theo&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></p>
    </div>
    <div class="binhluan1">
      <i class="far fa-comment-dots" aria-hidden="true" style="font-size:100px;margin:auto;color:#c9c9c9"></i><p></p>
      <div class="binhluan1-1">
        <form action="/binhluan/{{Session::get('id_tk')}}/{{$truyen[0]->truyen_id}}" method="POST">
          @csrf
            <textarea name="message" style="width:100%; height:150px;"></textarea>
            <br>
            <input type="submit" style="float: right;">
        </form>
      </div>
    </div>
    @isset($binhluan)
      @foreach ($binhluan as $bl)
        @if (!$bl->id_binh_luan_con)
        <div class="listcmt">
          <div class="m-avatar">
            <div class="avatar">
              @if (substr_count($bl->avatar,'http')>0)
                <img src="{{$bl->avatar}}" alt="" >
              @else
                <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$bl->avatar}}" alt="" >
              @endif
            </div>
          </div>
          <div class="comment">
            <div class="comment-box2">
              <div class="cmt-name">
                  <b>{{$bl->name}}</b>
              </div>
              <div class="cmt-nd">
                  <p>{{$bl->nd_binh_luan}}</p>       
              </div>
              {{-- <div class="cmt-rep">
                  <div style="margin-left: auto;">
                  <b>Cử báo</b>
                  <b>Trả lời</b>
                  </div>
              </div> --}}
              @if (Session::has('id_tk'))
                <div class="r123" style="display:flex">
                  <div style="margin-left: auto;margin-right:10px;" class="dropdown  dropright">
                    <p type="button" class="dropdown-toggle" data-toggle="dropdown">
                        Cử báo
                    </p>
                    <div class="dropdown-menu">
                        <label>Lý do cử báo:</label>
                      <a class="dropdown-item" href="review/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chinhtri">Đề cập đến chính trị</a>
                      <a class="dropdown-item" href="review/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chuiboi">Chửi bới, sỉ nhục thành viên khác</a>
                      <a class="dropdown-item" href="review/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/chuithe">Chửi thề nói tục</a>
                      <a class="dropdown-item" href="review/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/saisuthat">Quảng bá thông tin sai sự thật</a>
                      <a class="dropdown-item" href="review/cubao/{{$bl->id}}/{{$bl->id_binh_luan}}/lamdung">Lạm dụng ngôn ngữ chat</a>
                    </div>
                  </div>                                           
                  <p type='button' data-toggle="collapse" data-target="#traloi{{$bl->id_binh_luan}}"> Trả lời </p>
                </div>
              @else
                <div class="r123" style="display:flex">
                    <p  type='button' data-toggle="modal" data-target="#dangnhap"style="margin-right:10px;margin-left: auto;">Cử báo</p>
                    <p type='button' data-toggle="modal" data-target="#dangnhap"> Trả lời </p>
                </div>
              @endif 
              
            </div>
            <div id="traloi{{$bl->id_binh_luan}}" class="collapse">
              <div style="display: flex; width: 100%;padding: 20px 0 20px 10px;">
                <div class="avater-review">
                  @if (Session::has('avatar_tk'))
                   <img src="{{Session::get('avatar_tk')}}" alt="">
                  @else
                   <img src="http://127.0.0.1:8000/hinhanh/avatar/{{Session::get('avatar_tk')}}" alt="" >
                  @endif
                </div>
                <div style="width: 100%;">
                  <form action="/binhluan/binhluan/{{Session::get('id_tk')}}/{{$bl->id_binh_luan}}/{{$truyen[0]->truyen_id}}" method="post">
                    @csrf
                    <textarea name="traloi" id="" cols="30" rows="10" style="    width: 100%;"></textarea>
                    <button>Trả lời</button>
                  </form>                           
                </div>
              </div>
            </div>
            @foreach ($binhluan as $blcon)
              @if ($blcon->id_binh_luan_con==$bl->id_binh_luan)
                <div class="cmt-con">
                  <div class="m-avatar">
                    <div class="avatar">
                      @if (substr_count($blcon->avatar,'http')>0)
                        <img src="{{$blcon->avatar}}" alt="">
                      @else
                        <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$blcon->avatar}}" alt="" >
                      @endif
                    </div> 
                  </div>
                  <div class="comment-box3">
                    <div class="cmt-name">
                        <b>{{$blcon->name}}</b>
                    </div>
                    <div class="cmt-nd">
                        <p>{{$blcon->nd_binh_luan}}</p>       
                    </div>
                    @if (Session::has('id_tk'))
                <div class="r123" style="display:flex">
                  <div style="margin-left: auto;margin-right:10px;" class="dropdown  dropright">
                    <p type="button" class="dropdown-toggle" data-toggle="dropdown">
                        Cử báo
                    </p>
                    <div class="dropdown-menu">
                        <label>Lý do cử báo:</label>
                      <a class="dropdown-item" href="/binhluan/cubao/{{$blcon->id}}/{{$blcon->id_binh_luan}}/chinhtri">Đề cập đến chính trị</a>
                      <a class="dropdown-item" href="/binhluan/cubao/{{$blcon->id}}/{{$blcon->id_binh_luan}}/chuiboi">Chửi bới, sỉ nhục thành viên khác</a>
                      <a class="dropdown-item" href="/binhluan/cubao/{{$blcon->id}}/{{$blcon->id_binh_luan}}/chuithe">Chửi thề nói tục</a>
                      <a class="dropdown-item" href="/binhluan/cubao/{{$blcon->id}}/{{$blcon->id_binh_luan}}/saisuthat">Quảng bá thông tin sai sự thật</a>
                      <a class="dropdown-item" href="/binhluan/cubao/{{$blcon->id}}/{{$blcon->id_binh_luan}}/lamdung">Lạm dụng ngôn ngữ chat</a>
                    </div>
                  </div>                                           
                  <p type='button' data-toggle="collapse" data-target="#traloi{{$bl->id_binh_luan}}"> Trả lời </p>
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
        </div> 
        @endif
      @endforeach 
    @endisset
   
  </div>  
</div>
@if (Session::has('id_tk'))

  {{-- viết đánh giá --}}
  <div class="modal" id="vietdanhgia">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Đánh giá</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div>
            <p>Bạn cảm thấy truyện này như thế nào? (chọn sao nhé)</p>
          </div>
          <div></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Báo lỗi --}}
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
  <div class="modal fade" id="cubaotruyen" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tôi muốn báo cáo truyện</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="/truyen/bao-cao/{{$truyen[0]->truyen_id}}" method="post">
            @csrf
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="">Option 1
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="">Option 2
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="" disabled>Option 3
              </label>
            </div>
            <textarea name="baocao" id="" style="width:100%;" rows="10" placeholder="Thông tin thêm ..."></textarea>
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