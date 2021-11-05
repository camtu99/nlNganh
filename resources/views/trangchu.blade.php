@extends('layouttruyen')
@section('content')
<div>
  <div class="row">
    <div style="width:100%;background-color: white;padding: 25px;">
      <div class="list" style="width:100%">
        <div class="col-lg-12">
          <h3>Truyện mới cập nhật</h3>
          <div class="row">
            @foreach ($newtruyen as $truyen)
              <div class="book-item col-lg-3">
                <a href="/truyen/<?php echo $truyen->truyen_id;?> " data-toggle="tooltip" data-placement="bottom" title=" <?php echo $truyen->ten_truyen;?>" >
                  <div class="img-cover">   
                    <img src="http://127.0.0.1:8000/hinhanh/<?php echo $truyen->hinh_anh?>">  
                  </div>
                  <div class="infor">
                    <div class="infor-item">
                      <?php echo $truyen->ten_truyen;?>                           
                    </div>
                    <div class="author">
                      <?php echo $truyen->ten_tac_gia;?>
                    </div>
                    <div class="view-sach">
                      <i class="fa fa-eye" aria-hidden="true" style=" font-weight: 100;"><?php echo $truyen->luot_doc;?></i>
                      <i class="fa fa-comment" aria-hidden="true" style=" font-weight: 100;">2</i>
                    </div>
                  </div>
                </a>
              </div> 
            @endforeach
          </div>
          
          <div ><a href="/chuongmoi" style="color: #06eb3a;float: right;"> << Xem thêm >> </a></div>
        </div>  
                     
      </div><hr>
      {{-- thể loại hiện đại --}}
      <div class="list" style="width:100%">
        <div class="col-md-12">
          <h3>Hiện đại</h3>
          <div class="row">
            @foreach ($hiendai as $truyen)
              <div class="book-item col-md-3">
                <a href="" data-toggle="tooltip" data-placement="bottom" title=" <?php echo $truyen->ten_truyen;?>" >
                  <div class="img-cover">   
                    <img src="http://127.0.0.1:8000/hinhanh/<?php echo $truyen->hinh_anh?>">  
                  </div>
                  <div class="infor">
                    <div class="infor-item">
                      <?php echo $truyen->ten_truyen;?>                           
                    </div>
                    <div class="author">
                      <?php echo $truyen->ten_tac_gia;?>
                    </div>
                    <div class="view-sach">
                      <i class="fa fa-eye" aria-hidden="true" style=" font-weight: 100;"><?php echo $truyen->luot_doc;?></i>
                      <i class="fa fa-comment" aria-hidden="true" style=" font-weight: 100;">2</i>
                    </div>
                  </div>
                </a>
              </div> 
            @endforeach
          </div>
          <div ><a href="/theloai/Hiện Đại" style="color: #06eb3a;float: right;"> << Xem thêm >> </a></div>
        </div>
        <hr>
      </div>
      {{-- Cổ trang --}}

      <div class="col-md-12">
        <h3>Cổ trang</h3>
        <div class="row">
          @foreach ($cotrang as $truyen)
            <div class="book-item col-md-3">
              <a href="" data-toggle="tooltip" data-placement="bottom" title=" <?php echo $truyen->ten_truyen;?>" >
                <div class="img-cover">   
                  <img src="http://127.0.0.1:8000/hinhanh/<?php echo $truyen->hinh_anh?>">  
                </div>
                <div class="infor">
                  <div class="infor-item">
                    <?php echo $truyen->ten_truyen;?>                           
                  </div>
                  <div class="author">
                    <?php echo $truyen->ten_tac_gia;?>
                  </div>
                  <div class="view-sach">
                    <i class="fa fa-eye" aria-hidden="true" style=" font-weight: 100;"><?php echo $truyen->luot_doc;?></i>
                    <i class="fa fa-comment" aria-hidden="true" style=" font-weight: 100;">2</i>
                  </div>
                </div>
              </a>
            </div> 
          @endforeach
        </div>
      </div>
      <div ><a href="/theloai/Cổ Trang" style="color: #06eb3a;float: right;"> << Xem thêm >> </a></div>
      <div >
    </div>
  </div>
</div>  

    








@endsection    