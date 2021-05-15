@extends('layouttruyen')
@section('content')
<div>
  <div class="row">
    <div style="width:100%;background-color: white;padding: 25px;">
      <div class="list" style="width:100%">
        <div class="col-md-8">
          <h3>Chương mới</h3>
          <div class="row">
            @foreach ($newtruyen as $truyen)
              <div class="book-item col-md-3">
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
        </div>
        <div class="col-md-4">
          <div><p>Top xem nhiều nhất</p></div>
          <div class="list-top-view">
            <ul class="list-top-ul">
              @foreach ($viewtruyen as $view)
                <li class="list-top-li">
                  <a href="/truyen/{{$view->truyen_id}}">
                    <div class="list-top-img">
                      <img src="http://127.0.0.1:8000/hinhanh/<?php echo $view->hinh_anh?>" style="height=70px;width:50px;">
                    </div>
                    <div class=" infor-infor ">
                      <b><?php echo $view->ten_truyen;?></b>
                      <p> <?php echo $view->ten_tac_gia;?></p>
                      <p><i class="fa fa-eye" aria-hidden="true" style=" font-weight: 100;"><?php echo $view->luot_doc;?>&nbsp lượt đọc</i></p>
                    </div>
                  </a>
                </li>   
              @endforeach           
            </ul>
          </div>
        </div>          
      </div>
      {{-- thể loại hiện đại --}}
      <div class="col-md-8">
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
      </div>
      {{-- Cổ trang --}}
      <div class="col-md-8">
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
    </div>
  </div>
</div>  

    








@endsection    