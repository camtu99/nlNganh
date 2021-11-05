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
    <link rel="stylesheet" href="{{asset('css/them1.css')}}">
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
                      <div class="theloai111">
                        <p><a href="/theloai/Cổ đại"> Cổ đại</a> </p>                     
                        <p><a href="/theloai/Hiện đại">Hiện đại</a></p>
                       <p><a href="/theloai/Cổ đại">Tương lai</a>  </p>                    
                        <p><a href="/theloai/Hiện đại">Dân quốc</a></p>
                      </div> 
                      <div class="theloai111">
                        <p><a href="/theloai/Tình cảm"> Tình cảm</a>    </p>                  
                       <p> <a href="/theloai/Võ hiệp">Võ hiệp</a></p>
                       <p><a href="/theloai/Tiên hiệp">Tiên hiệp</a>  </p>                    
                       <p><a href="/theloai/Trinh thám">Trinh thám</a></p>
                      </div> 
                      <div class="theloai111">
                        <p><a href="/theloai/Kinh dị"> Kinh dị</a>    </p>                  
                       <p> <a href="/theloai/Võng du">Võng du</a></p>
                       <p><a href="/theloai/Huyền huyễn">Huyền huyễn</a>  </p>                    
                       <p><a href="/theloai/Hài hước">Hài hước</a></p>
                      </div> 
                      <div class="theloai111">
                        <p><a href="/theloai/Dị thế"> Dị thế</a>    </p>                  
                       <p> <a href="/theloai/Hồng hoang">Hồng hoang</a></p>
                       <p><a href="/theloai/Tinh tế">Tinh tế</a>  </p>                    
                       <p><a href="/theloai/Mạt thế">Mạt thế</a></p>
                      </div> 
                      <div class="theloai111">
                        <p><a href="/theloai/Phong thủy"> Phong thủy</a>    </p>                  
                       <p> <a href="/theloai/Phá án">Phá án</a></p>
                       <p><a href="/theloai/Trộm mộ">Trộm mộ</a>  </p>                    
                       <p><a href="/theloai/Thể thao">Thể thao</a></p>
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
   

    @if (Session::has('thongbao'))
      <div class="container">
        <div id="quangcaoslide" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li  data-target="#quangcaoslide" data-slide-to="0" class="active"></li>
            <li data-target="#quangcaoslide" data-slide-to="1"></li>
            <li data-target="#quangcaoslide" data-slide-to="2"></li>
          </ul>            
          <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="gfdgsd"> 
            <img src="https://media-cdn.laodong.vn/Storage/NewsPortal/2021/5/26/913299/Ngan-Ha25.jpg" alt="Chicago" width="100%" height="400px"> </a > 
            </div>
            <div class="carousel-item">
              <img src="https://media-cdn.laodong.vn/Storage/NewsPortal/2021/5/26/913299/Ngan-Ha25.jpg" alt="Chicago"  width="100%"height="400px">
            </div>
            <div class="carousel-item">
              <img src="https://media-cdn.laodong.vn/Storage/NewsPortal/2021/5/26/913299/Ngan-Ha25.jpg" alt="New York"  width="100%"height="400px">
            </div>
          </div>
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>       
    @endif
  
   
    <div class="container">
      <div class="search">
        <form action="/search" method="GET">
            <div class="search-right">
                <input style="border-radius:5px;padding-left:10px;width:290px;" placeholder="Nhập tên cần tìm" type="text" name="search">
                <button style="border: 0;background-color: transparent;"><i class="fa fa-search" aria-hidden="true" style="color:#00CED1"></i></button>
            </div>
        </form>
      </div> 
      @section('content')
        
      @show   
    </div>
    <footer style="    background-color: #0194a6;color: #a8edeb;">
      <div class="container" style="padding: 20px;font-size: 16px;">
        <div class="row" style="padding: 0 20px;">
          <div class="col-md-5">
            <h5>Giới thiệu</h5>
            Nhã Các là công cụ dịch tiếng Hoa miễn phí tức thời, người dùng không cần biết tiếng Hoa cũng có thể chuyển ngữ dễ dàng. Với những công cụ đơn giản, thân thiện và tự động hoá, web cung cấp những trải nghiệm tiên tiến nhất, nối liền khoảng cách ngôn ngữ.
          </div>
          <div class="col-md-7">
            <div class="row" style="margin-left: 50px;">
              <div class="col-md-3">
                <h5>Liên kết</h5>
                <ul style="list-style: none;padding: 0;">
                    <li><a href="/" style="color: #a8edeb">Trang chủ</a></li>
                    
                    <li><a href=""style="color: #a8edeb">Đăng ký</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h5>Trợ giúp</h5>
                <ul style="list-style: none;padding: 0;">
                    <li>Báo lỗi</li>
                    <li>Bảo mật</li>
                    <li>Điều lệ</li>
                    <li>Liên hệ</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h5>Liên hệ</h5>
                  <li style="list-style: none;">Email: nhacactruyen@gmail.com</li>
              </div>
            </div>
          </div>
        </div>
    </div>
    </footer>
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