@extends('layouttruyen')
@section('content')
<div class="tennd">
  <p>Truyện <i class="fa fa-angle-right" aria-hidden="true"> Bong bóng lên trời </i></p>
</div>
<div class="thong_tin">
  <div class="row">
    <div class="col-lg-9">
      <div id="thongtintruyen" class="thong-tin-1">
        <div class="thong-tin-1-1">
          <div class="detail_img" style="margin: 20px;">
            <img src="./truyen/Bong bóng lên trời/27.gif" alt="" style="width: 200px;height: 240px;"> 
          </div>
          <div class="detail_product">
            <h2>Bong bóng lên trời</h2>
            <div class="view-sach" style="display:flex;font-weight:100">
              <p class="iconct"> <i class="fa fa-eye" aria-hidden="true" style="font-weight: 100;">4</i></p>
              <p class="iconct">   <i class="fa fa-comment" aria-hidden="true" style="font-weight: 100;">0</i></p>
              <a href="" type="buttom" style="color:black">  <i class="fas fa-star    " style="font-weight: 100;" aria-hidden="true">0 </i></a>
            </div>
            <p>Tên tác giả: <a href="timkiem.php?tacgia=TG2">Nhất Nhất</a></p>
            <p>Mới nhất: <a href="noidungchuong.php?chuong=52">Chương 2</a></p>   
            <p>Thời gian đổi mới: 2020-12-24 14:59:36</p>
            <p>Tình trạng: <a href="timkiem.php?tinhtrang=Hoàn thành">Hoàn thành</a></p>                           
          </div>
        </div>
        <div class="thong-tin-1-2">
          <div>
            <p> Thể loại : 
              <a href="timkiem.php?theloai=Kinh dị">Kinh dị</a>
              <a href="timkiem.php?theloai=Tuổi học trò">Tuổi học trò</a>
              <a href="timkiem.php?theloai=Truyện ngắn">Truyện ngắn</a>                                
            </p>
          </div>
          <div>
            <p>Vì hoàn cảnh, Thường phải giúp mẹ bằng nghề bán kẹo kéo ngoài giờ học và làm quen với cuộc sống trên đường phố. Ở đó cậu đánh bạn với những người nghèo và hiểu thêm nhiều điều không có trong sáchvà nhà trường.</p>
          </div>
          <div style="display: flex;padding:10px;">
            <div class="name1-1">
              <a href="" class="name1">Name</a>
              <a href="" class="name1"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
              <a href="" class="name1">Review</a>
            </div>
            <div class="name1-2">
              <a href="" class="name2">Name</a>
              <a href="" class="name2"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
              <a href="" class="name2">Review</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3" style="padding-left: 0;">
      <div id="cungloai" class="right">
        <div id="cungtheloai" class="right1">
          <ul id="hihi" style="overflow: scroll; height: 761.6px;">
            <li><p>Cùng thể loại</p></li>
            <li>
              <div class="rr">
                <a href="">
                    <img src="./truyen/Tê kiến/te_kien.jpg" alt="">
                </a>
                <div class="rrr">
                    <p class="ts"><a href="chitiettruyen.php?tentruyen=Tê kiến&amp;&amp;masach=MS5">Tê kiến</a></p>
                    <p class="tacgia"><a href="timkiem.php?tacgia=TG2">Nhất Nhất</a></p>
                    <p class="tinhtrang"><a href="timkiem.php?tinhtrang=Hoàn thành">Hoàn thành</a></p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mucluc">
  <div class="mucluc1">
    <p>Mục Lục</p>
  </div>
  <div class="mucluc2">
    <ul>
      <li class="mucluc2-2"><a href="noidungchuong.php?chuong=51">Chương 1</a></li>
      <li class="mucluc2-2"><a href="noidungchuong.php?chuong=52">Chương 2</a></li>
      <li class="mucluc2-2"><a href=""></a>&nbsp;</li>                
    </ul>
  </div>
</div>
<div class="binhluan">         
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
</div>
@endsection