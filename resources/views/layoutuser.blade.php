<!doctype html>
<html lang="en">
  <head>
    <title>Convert truyện</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
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
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>    
          </ul>
        </div>  
      </nav>
    <div class="thongtin">
        <div class="avatar">
            <div class="avatar-img">
                <img class="img-avatar" src="http://www.elle.vn/wp-content/uploads/2017/07/25/hinh-anh-dep-1.jpg" alt="">
            </div>
            <h1 class="name">mẫu text</h1>
        </div>
        <div class="capdo">
            <div class="capdo2">
                <div class="capdo1">
                    <p>13</p>
                    <p>Following</p>
                </div>
                <div class="capdo1">
                    <p>134</p>
                    <p>Follower</p>
                </div>
                <div class="capdo1">
                    <p>14563</p>
                    <p>Thanks</p>
                </div>
                <div class="capdo1">
                    <p>7</p>
                    <p>Level</p>
                </div>
            </div>
        </div>
    </div>
    <div class="dieukhien">
        <div class="container">
            <div class="row">
                <div class="thanh-dkh">
                    <div class="col-md-8">
                        <div style="margin: auto;"><ul class="nav nav-tabs thanh-dieu-khien">
                            <li class="thanh-dk-1"><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
                            <li class="thanh-dk-1"><a href="{{url('hoatdong')}}">Hoạt động</a></li>
                            <li class="thanh-dk-1"><a href="{{url('thuvien')}}" >Thư viện</a></li>
                            <li class="thanh-dk-1"><a href="" >Works</a></li>
                            <li class="thanh-dk-1"><a href="{{url('review')}}" >Review</a></li>
                        </ul></div>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav">
                            <li class="thanh-dk-1 caidat" style="margin-left: auto;"><i class="fas fa-plus"></i> Follow</li>
                            <li class="thanh-dk-1 caidat"> <i class="fas fa-tools"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px;width: 100%;"></div>
    @section('content')
    @show