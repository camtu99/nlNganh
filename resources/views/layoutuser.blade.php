<!doctype html>
<html lang="en">
  <head>
    <title>Convert truyện</title>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="  background-color:#eff4f3">
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- menu -->
    <div>
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
                @if (Session::has('email_tk'))
                <li class="nav-item" style="margin-left: auto;">
                  <a href="/user/{{Session::get('email_tk')}}">{{Session::get('ten_tk')}}</a>
                </li>
                <li class="nav-item" style="padding: 0 10px;">
                  <a href="{{URL::to('user/logout')}}">Đăng xuất</a>
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
                <input type="email" id="fname" name="email"style="width:80%">
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
            <form action="/dangki" method="post">
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
    @if (substr_count($user[0]->anh_bia,'http')>0)
      <div class="thongtin" style="background-image: url({{$user[0]->anh_bia}})">
    @else
      <div class="thongtin" style="background-image: url(http://127.0.0.1:8000/hinhanh/{{$user[0]->anh_bia}})"> 
    @endif   
      <div class="avatar">
          <div class="avatar-img">
            @if (substr_count($user[0]->avatar,'http')>0)
              <img src="{{$user[0]->avatar}}" alt="" style=" width: 160px;height: 160px;border-radius: 50%;margin: 30px">
            @else
              <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$user[0]->avatar}}" alt="" style=" width: 160px;height: 160px;border-radius: 50%;margin: 30px">
            @endif
          </div>
          <h1 class="name">{{$user[0]->name}}</h1>
      </div>
      <div class="capdo">
          <div class="capdo2">
              <div class="capdo1" @if ($following)  type="button" data-toggle="collapse" data-target="#follwing" @endif>
                @if ($following)
                  <p>{{count($following)}}</p>
                @else
                  <p>0</p>
                @endif  
                <p>Following</p>
              </div>
              <div class="capdo1" @if ($follower)  type="button" data-toggle="collapse" data-target="#follwer" @endif>
                @if ($follower)
                  <p>{{count($follower)}}</p>
                @else
                  <p>0</p>
                @endif
                <p>Follower</p>
              </div>
              <div class="capdo1">
                  <p>{{$user[0]->thanks}}</p>
                  <p>Thanks</p>
              </div>
              <div class="capdo1">
                  <p>{{$user[0]->thanh_tich}}</p>
                  <p>Tích phân</p>
              </div>
          </div>
      </div>
      <div style="background-color: white;">
        <div class="container">
          <div id="follwer" class="collapse">
            @if ($follower)
            <div  style="display: flex;flex-wrap: wrap;padding: 20px 0;">
              @foreach ($follower as $follower_id)
                <div class="follow">
                  <a href="/user/{{$follower_id->email}}">
                    @if (substr_count($follower_id->avatar,'http')>0)
                      <img src="{{$follower_id->avatar}}" alt="" >
                    @else
                      <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$follower_id->avatar}}" alt="" >
                    @endif
                    <p class="ten_user">{{$follower_id->name}}</p>
                  </a>
                </div>
               @endforeach
            </div>
            @endif
          </div>
          <div id="follwing" class="collapse">
            @if ($following)
            <div style="display: flex;flex-wrap: wrap;padding: 20px 0;">
              @foreach ($following as $following_id)
                <div class="follow">
                  <a href="/user/{{$following_id->email}}">
                    @if (substr_count($following_id->avatar,'http')>0)
                      <img src="{{$following_id->avatar}}" alt="">
                    @else
                      <img src="http://127.0.0.1:8000/hinhanh/avatar/{{$following_id->avatar}}" alt="" >
                    @endif
                    <p class="ten_user">{{$following_id->name}}</p>
                  </a>
                </div>
              @endforeach
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="dieukhien">
        <div class="container">
            <div class="row">
                <div class="thanh-dkh">
                  <div class="col-md-8">
                    <div style="margin: auto;">
                      <ul class="nav nav-tabs thanh-dieu-khien">
                        <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/user/{{$user[0]->email}}">Giới thiệu</a></li>
                        <li class="thanh-dk-1"><a href='http://127.0.0.1:8000/user/thuvien/{{$user[0]->email}}'>Thư viện</a></li>
                        <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/user/congviec/{{$user[0]->email}}" >Works</a></li>
                        <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/user/review/{{$user[0]->email}}" >Review</a></li>
                        <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/user/hoatdong/{{$user[0]->email}}" >Hoạt động</a></li>
                        @if (Session::get('email_tk')==$user[0]->email)
                          <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/bookmark/user" >Bookmark</a></li>
                          <li class="thanh-dk-1"><a href="http://127.0.0.1:8000/taotruyen/user">Nhúng link</a></li>  
                        @endif
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <ul class="nav">
                        @if (Session::get('email_tk')!=$user[0]->email)
                          @if (isset($follow)&&$follow=='ok')
                          <li class="thanh-dk-1 caidat" style="margin-left: auto;"><a href="/follow/huy/{{$user[0]->id}}">Hủy Follow</a></li>
                          @else
                          <li class="thanh-dk-1 caidat" style="margin-left: auto;"><a href="/follow/them/{{$user[0]->id}}"><i class="fas fa-plus"></i> Follow</a></li>
                          @endif     
                          <div class="dropdown" >
                            <li type="button" data-toggle="dropdown" class="thanh-dk-1 caidat"><i class="fas fa-tools"></i></li>
                            <div class="dropdown-menu">
                              <p class="dropdown-item" type="button"  data-toggle="modal" data-target="#baocao">Báo cáo</p>
                            </div>
                          </div>
                        @else
                          <div class="dropdown" style="margin-left: auto;">
                            <li type="button" data-toggle="dropdown" class="thanh-dk-1 caidat"><i class="fas fa-tools"></i></li>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/setup/{{Session::get('id_tk')}}">Thay đổi thông tin</a>
                            </div>
                          </div> 
                        @endif 
                      </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px;width: 100%;"></div>
    @include('error')
    <div class="" style="background-color:rgb(115 223 247 / 27%);padding: 50px 30px;">
    <div class="container">
        @section('content')
        @show

      </div>
    </div>
    {{-- báo cáo user --}}
    @if (Session::get('email_tk')!=$user[0]->email)
      <div class="modal " id="baocao">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Báo cáo thành viên</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div style="padding:10px 0;">
                <p style="color: #4b95e8;font-weight: 800;">Lý do báo cáo:</p>
                <form action="/baocao/{{$user[0]->id}}/" method="post" style="width:100%;">
                  @csrf
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" value="spam" name="spam">Spam
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" value="thotuc" name="thotuc">Ngôn ngữ thô tục, quấy rối
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" value="khac" name="khac">Khác
                    </label>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="5" id="comment" name="lydo" placeholder="Mô tả ..."></textarea>
                  </div>             
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button><button style="width: 130px;" class="btn btn-info" type="submit">Báo cáo</button></form>
            </div>
            
          </div>
        </div>
      </div>    
    @endif
    <script>
      function baoloi() {
        alert("Bạn chưa đăng nhập");
      }
      </script>