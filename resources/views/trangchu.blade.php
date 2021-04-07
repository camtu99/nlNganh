@extends('layouttruyen')
@section('content')
    <div class="container">
      <div class="row">
        <div>
          <div class="col-md-8">
            <h3>Chương mới</h3>
            <div class="row">
              @foreach ($tentruyen as $truyen)
                
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
          <div class="col-md-4">

          </div>
        </div>
      </div>

    </div>








@endsection    