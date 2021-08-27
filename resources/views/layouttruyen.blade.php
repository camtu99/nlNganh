<!doctype html>
<html lang="en">
  <head>
    <title>Nhã Các | Đọc truyện online</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main1.css')}}">
  </head>
  <body style="background-color: #F5F5F5; font-size: large;height:100%">
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <div>
     
      @include('error')
      <div>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-image: url({!! asset('hinhanh/logo5.jpg') !!});">
          <div class="container">
            <a class="navbar-brand" href="index.php"><img src="{!! asset('hinhanh/logo4.PNG') !!}" alt="" style="height: 45px;width: 160px;"> </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="width:100%">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <div class="dropdown1">
                    <span><a class="nav-link" href="#">Thể loại</a></span>
                    <div class="dropdown-content1">
                      <div style="">
                        @foreach ($theloai as $tl)
                          <p><a href="/theloai/{{$tl->ten_the_loai}}">{{$tl->ten_the_loai}}</a></p>
                        @endforeach
                      </div>                
                    </div>
                  </div>
                   
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/tacgia/">Tác giả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/tim-kiem-nang-cao">Tìm truyện</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/review')}}">Review</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{URL::to('/diendan')}}">Diễn đàn</a>
                </li>
                <li class="nav-item">
                  <div class="dropdown1">
                    <span><a class="nav-link" href="#">Thông tin</a></span>
                    <div class="dropdown-content1">
                      <div style="">
                       <p><a href="/quydinh">Quy định</a></p>
                      <p> <a href="/topic/cam-nhung">Cấm nhúng</a></p>
                      </div>                
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown1">
                    <span><a class="nav-link" href="#">Bảng xếp hạng</a></span>
                    <div class="dropdown-content1">
                      <div style="">
                       <p><a href="/bang-xep-hang">Bảng xếp hạng tích phân</a></p>
                      <p> <a href="/thuong-thanh">Thương thành</a></p>
                      </div>                
                    </div>
                  </div>
                </li>
                @if (Session::has('email_tk'))
                  <li class="nav-item" style="margin-left: auto;">
                    <a href="/user/{{Session::get('email_tk')}}">{{Session::get('ten_tk')}}</a>
                  </li>
                  <li class="nav-item" style="padding: 0 10px;">
                    <a href="/user/logout">Đăng xuất</a>
                  </li>
                @else
                  <li class="nav-item" style="margin-left: auto;"data-toggle="modal" data-target="#dangnhap">
                    Đăng nhập
                  </li>
                  <li class="nav-item" style="padding: 0 10px;"data-toggle="modal" data-target="#dangki">
                    Đăng kí
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="modal fade" id="dangnhap">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Đăng nhập</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{URL::to('user/login')}}" method="post">
              @csrf
              <div style="display:flex;margin:10px">
                <label for="fname" style="width:30%;">Đăng nhập email:</label><br>
                <input type="text" id="fname" name="email"style="width:80%">
              </div>
              <div style="display:flex;margin:10px"> 
                <label for="lname" style="width:30%">Mật khẩu:</label><br>
                <input type="password" id="lname" name="matkhau"style="width:80%">
              </div>
              <input type="submit" value="Submit" style="width:100%;margin-top:10px;">
            </form>
            <a href="/quenmatkhau">Quên mật khẩu ???</a>
          </div>  
        </div>
      </div>
    </div>
    <div class="modal fade" id="dangki">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Đăng kí</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="dangki" method="post">
              @csrf
              <div style="display:flex;margin:10px">
                <label for="fname" style="width:30%;">Email:</label><br>
                <input type="email" id="fname" name="email"style="width:80%">
              </div>
              <div style="display:flex;margin:10px"> 
                <label for="lname" style="width:30%">Mật khẩu:</label><br>
                <input type="password" id="lname" name="pass" style="width:80%">
              </div>
              <div style="display:flex;margin:10px"> 
                <label for="lname" style="width:30%">Nhập lại mật khẩu:</label><br>
                <input type="password" id="lname" name="repass"style="width:80%">
              </div>
              <input type="submit" value="Submit" style="width:100%;margin-top:10px;">
            </form>
          </div>  
        </div>
      </div>
    </div>
    <div style="padding: 1rem;">
      <div style="text-align: center;color:#007bff;font-weight:700">
        @isset($thongbao)
          <div style="text-align:left;display:inline-block">
            @foreach ($thongbao as $item)
               <a href="{{$item->link_topic}}"><i class="fas fa-caret-right    "></i><u>{{$item->ten_topic}}</u><br></a> 
            @endforeach
          </div> 
        @endisset
      </div>
    </div>
    <div class="container">
      <div class="search">
        <form action="timkiem.php" method="GET">
            <div class="search-right">
                <input style="border-radius:5px;padding-left:10px;width:290px;" placeholder="Nhập tên cần tìm" type="text" name="search">
                <button style="border: 0;background-color: transparent;"><i class="fa fa-search" aria-hidden="true" style="color:#00CED1"></i></button>
            </div>
        </form>
      </div> 
      @section('content')
        
      @show   
    </div>
    @if (!Session::has('qc'))
    @isset($quangcao)
    <div id="ads-left">
      <div style="margin:0 0 5px 0; padding:0;width:300px;position:fixed; left:50%;margin-left: 590px; top:0;">
        <a href="{{$quangcao[0]->link_topic}}" >
          <img  height="800" src="{{$quangcao[0]->hinh_anh_topic}}" width="300"/>      
        </a>
      </div>
    </div>
    <div id="ads-right">
      <div style="margin:0 0 5px 0; padding:0;width:300px;position:fixed; right:50%;margin-right: 590px; top:0;">
        <a href="{{$quangcao[0]->link_topic}}"><img  height="800" src="{{$quangcao[0]->hinh_anh_topic}}" width="300"/></a>
      </div>
    </div>
    @endisset
    @endif
    <script>
      function baoloi() {
        alert("Bạn chưa đăng nhập");
      }
      </script>
  </body>
</html>