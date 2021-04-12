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
      <div>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-image: url({!! asset('hinhanh/logo5.jpg') !!});">
          <div class="container">
            <a class="navbar-brand" href="index.php"><img src="{!! asset('hinhanh/logo4.PNG') !!}" alt="" style="height: 45px;width: 160px;"> </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="width:100%">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thể loại</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Tác giả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Tìm truyện</a>
                </li>
                <li class="nav-item" style="margin-left: auto;"data-toggle="modal" data-target="#dangnhap">
                  Đăng nhập
                </li>
                <li class="nav-item" style="margin-left: auto;"data-toggle="modal" data-target="#dangki">
                  Đăng kí
                </li>
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
            <form action="/action_page.php">
              <div style="display:flex;margin:10px">
                <label for="fname" style="width:30%;">Đăng nhập:</label><br>
                <input type="text" id="fname" name="fname" value="John"style="width:80%">
              </div>
              <div style="display:flex;margin:10px"> 
                <label for="lname" style="width:30%">Mật khâu:</label><br>
                <input type="text" id="lname" name="lname" value="Doe"style="width:80%">
              </div>
              <input type="submit" value="Submit" style="width:100%;margin-top:10px;">
            </form>
            <button style="width:100%;margin:5px;">đăng nhập bằng gg</button>
            <button style="width:100%;margin:5px;">đăng nhập bằng fb</button>
          </div>  
        </div>
      </div>
    </div>
    <div style="padding: 1rem;">
      <div style="text-align: center;color:#007bff;font-weight:700">
        <div style="text-align:left;display:inline-block">
        <i class="fas fa-caret-right    "></i><u>Hướng dẫn nạp thẻ</u><br>
        <i class="fas fa-caret-right    "> </i><u>Hướng dẫn báo cáo truyện lỗi</u><br>
        <i class="fas fa-caret-right    "></i><u>Danh sách ngôn tình đề cử tháng 12</u><br>
        <i class="fas fa-caret-right    "></i> <u>Danh sách ngôn đam mỹ cử tháng 12</u>
        </div>
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
</body>
</html>