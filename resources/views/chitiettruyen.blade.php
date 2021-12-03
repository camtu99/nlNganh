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
            <div style="display: flex">
              @isset($hagtag_truyen)

              <b>Tag: </b>
                  @foreach ($hagtag_truyen as $tag)
                      <a type="button" href="/tag/{{$tag->ten_tag}}" style="padding: 2px 10px;background-color: #b0e0e652;border-radius: 10%;color: #08086dc7;margin: 0 5px;">{{$tag->ten_tag}}</a>
                  @endforeach
              @endisset
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
                      <p  data-toggle="modal" data-target="#tag"type="button">Thay đổi tag</p>
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
                                <p style="text-align: center"><a style="color: black;" href="/thuvien/them/{{$tv->id_thu_vien}}/{{$truyen[0]->truyen_id}}">{{$tv->ten_thu_vien}}</a></p>
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
      {{$mucluc->withQueryString()->links()}}         
    </div>
  </div>
  
  {{-- đánh giá sao --}}
  <div style="background-color: white;padding: 30px 0;    margin-top: 40px;">
    <h2 style="padding: 0 30px 20px;">Đánh giá và nhận xét {{$truyen[0]->ten_truyen}}</h2>
    <div class="row">
      <div class="col">
        <div class="c-rate__left text-center">
          <p>Đánh Giá Trung Bình</p>
          <div class="point-danh-gia">
            @if ($diemtrungbinh)
            {{sprintf("%.1f", $diemtrungbinh)}} / 5
            @else
             0/5    
            @endif
          </div>       
          <span>{{$countdanhgia}} lượt đánh giá </span>
        </div>
      </div>
      <div class="col-5">
        <div class="c-rate__center">
          <div class="c-progress-list">
            @for ($i = 1; $i < 6; $i++)
              @if ($b[$i]==0)
                @foreach ($danhgiadiem as $sao)
                  @if ($sao->danh_gia==$i)                 
                  <div class="c-progress-item">
                    <label>
                        {{$i}}
                        <i class="demo-icon ye-star small icon-star"></i>
                    </label>
                    <div class="c-progress-bar">
                        <span class="c-progress-value" style="width: {{$sao->solan/$solan*100}}%;"></span>
                    </div>
                    <span>{{$sao->solan}}</span>
                  </div>
                  @endif
                @endforeach 
              @else
              <div class="c-progress-item">
                <label>
                    {{$i}}
                    <i class="demo-icon ye-star small icon-star"></i>
                </label>
                <div class="c-progress-bar">
                    <span class="c-progress-value" style="width: 0%;"></span>
                </div>
                <span>0</span>
              </div> 
              @endif                
            @endfor
            
          </div>
        </div>
      </div>
      <div class="col" style="    margin: auto;">
        <div class="c-rate__right text-center">
            <p class="small-para">Bạn đã đọc truyện này?</p>
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
              <form action="/danhgia/{{$truyen[0]->truyen_id}}" method="POST">
                <div class="stars">
                  @csrf
                  <input value="5" class="star star-5" id="star-5" type="radio" name="star"/>
                  <label class="star star-5" for="star-5"></label>
                  <input value="4"class="star star-4" id="star-4" type="radio" name="star"/>
                  <label class="star star-4" for="star-4"></label>
                  <input value="3"class="star star-3" id="star-3" type="radio" name="star"/>
                  <label class="star star-3" for="star-3"></label>
                  <input value="2"class="star star-2" id="star-2" type="radio" name="star"/>
                  <label class="star star-2" for="star-2"></label>
                  <input value="1"class="star star-1" id="star-1" type="radio" name="star"/>
                  <label class="star star-1" for="star-1"></label>               
                </div>
                <p class="f-err" style="display: none;">Vui lòng chọn đánh giá của bạn về truyện này</p>
            </div>
          </div>
          <div class="col-8">
            <div class="c-user-rate-form">
              <textarea name="danhgia" id="txtReview" rows="4" placeholder="Bạn có khuyên người khác đọc truyện này không? Tại sao?" required></textarea>
              @if (Session::has('id_tk'))
              <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
              @else
              <p onclick="baoloi()"  class="btn btn-primary">Gửi đánh giá</p>
              @endif             
            </div>
          </form>
          </div>
        </div>    
      </div>
    </div>
       {{-- mục lục đánh giá sao --}}
    <div>   
      @isset($danhgiasao)
      <div class="c-user-comment">     
        <div class="c-comment">
          @foreach ($danhgiasao as $dg)
            @if ($dg->trang_thai_bl=="sẵn sàng")
              <div class="c-comment-box">
                <div class="c-comment-box__avatar">
                  @if (substr_count($dg->avatar,'http')>0)
                    <img src="{{$dg->avatar}}" alt="" style="    width: 70px;height: 70px;">
                  @else
                    <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$dg->avatar}}" alt="" style="    width: 70px;height: 70px;">
                  @endif  
                </div>        
                <div class="c-comment-box__content" style="width:100%">
                  <div class="c-comment-name">{{$dg->name}}  
                    @if(Session::get('id_tk'))
                    @if (Session::get('tk_admin') || Session::get('id_tk') == $dg->id)                                          
                        <a style=" margin-left: auto;color:#eb7b07;;" href="/binhluan/xoa/{{$dg->id_binh_luan }}"><i class="fas fa-minus-circle"></i></a>                                               
                    @endif
                @endif</div>
                  <div class="list-star">
                    <ul>
                      <ul>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($dg->danh_gia > $i)
                              <li >
                                <i class="fas fa-star small ye-star icon-star"></i>
                              </li>
                            @else
                              <li >
                                <i  class="fas fa-star small ye-star icon-star non-star"></i>
                              </li>
                            @endif
                        @endfor                
                      </ul>
                      <span>vào ngày {{$dg->ngay_bl}}</span>
                    </ul>
                  </div>
                  <div class="c-comment-text">{{$dg->nd_binh_luan}}</div>           
                </div>
              </div>
            @endif 
          @endforeach
          
          
        </div>
        <div>{{$danhgiasao->links()}} </div>
      </div> 
      @endisset
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
        @if ($bl->trang_thai_bl=="sẵn sàng")
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
                  <div class="cmt-name" style="display: flex">
                      <b>{{$bl->name}}</b>
                      @if(Session::get('id_tk'))
                      @if (Session::get('tk_admin') || Session::get('id_tk') == $bl->id)                                          
                          <a style=" margin-left: auto;color:#eb7b07;;" href="/binhluan/xoa/{{$bl->id_binh_luan }}"><i class="fas fa-minus-circle"></i></a>                                               
                      @endif
                      @endif
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
                  @if ($blcon->trang_thai_bl=="sẵn sàng")
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
                          <div class="cmt-name" style="display: flex">
                              <b>{{$blcon->name}}</b>
                              @if(Session::get('id_tk'))
                                  @if (Session::get('tk_admin') || Session::get('id_tk') == $blcon->id)                                          
                                      <a style=" margin-left: auto;color:#eb7b07;;" href="/binhluan/xoa/{{$blcon->id_binh_luan }}"><i class="fas fa-minus-circle"></i></a>                                               
                                  @endif
                              @endif
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
                  @endif 
                @endforeach
              </div>
            </div> 
          @endif
        @endif
      @endforeach 
    @endisset
    <div>{{$binhluan->appends(['binhluan' => 'truyen'])->links()}} </div>    
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
                <input type="checkbox" name='saithongtin' class="form-check-input" value="Quảng bá thông tin sai sự thật">Quảng bá thông tin sai sự thật
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name='chinhtri' class="form-check-input" value="Đề cấp chính trị">Đề cấp chính trị
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name='chuanmuc' class="form-check-input" value="Có yếu tố vi phạm chuẩn mực đạo đức">Có yếu tố vi phạm chuẩn mực đạo đức
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
        <div class="modal-content" style="    width: 600px;">
          <div class="modal-body" style="text-align: center">
            <form action="/suatruyen/theloai/{{$truyen[0]->truyen_id}}/" method="post">
              @csrf
              <div class="row">
                @if ($dstheloai)
                  @foreach ($dstheloai as $ds)
                    <div class="form-check col-md-4">
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
    <div class="modal fade" id="tag" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="    width: 600px;">
          <div class="modal-body" style="text-align: center">           
              <div class="row">
                @if ($hagtag_truyen)
                <div class="col-md-12"> <h5 style="text-align: start;">Tag</h5> </div>
                  @foreach ($hagtag_truyen as $ds)
                    <div class="form-check col-md-4">
                      <label class="form-check-label" style="padding: 2px 5px; background-color: #11c9cf;color: lightyellow; border-radius: 0.5rem;">
                        {{$ds->ten_tag}}
                      </label>
                      <a href="/truyen/hagtag/xoa/{{$ds->id_hagtag}}" style="color: orange;">Xóa</a>
                    </div>  
                  @endforeach
                @endif
              </div>
              <form action="/hagtag/suatag/{{$truyen[0]->truyen_id}}" method="post">
                @csrf
                <div class="col-md-12" style="margin: 25px 0;text-align: start;">
                  <b>Thêm tag: </b> 
                  <input type="text" name="tag" id="">
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