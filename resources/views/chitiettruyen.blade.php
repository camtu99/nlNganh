

<html lang="vn"><head>
    <title>Nhã Các | Đọc truyện online</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
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
    <!-- hai bảng quảng cáo -->
    <div style="height:100%">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-image: url(logo5.jpg);">
          <div class="container">
            <a class="navbar-brand" href="index.php"><img src="logo4.png" alt="" style="height: 45px;width: 160px;"> </a>
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
                    <li class="nav-item" style="margin-left: auto;">
  <dialog id="dangki" class="formdangnhap">   
      <div style="display:flex;">
        <h2>Đăng kí  </h2>
        
        <button style="margin-left: auto;" onclick="closedangki()">Đóng</button>
      </div>
      <form action="?dangki" method="post">
                <div class="form-group">
                <label class="dndk">Tên đăng nhập :</label>
                <input type="text" class="form-control" placeholder="Tài khoản" value="" name="user" required="">
                <p id="taikhoan"></p>
                </div>
                <div class="form-group">
                <label class="dndk">Mật khẩu:</label>
                <input type="password" class="form-control" placeholder="Nhập pass" value="" name="pass" required="">
                </div>
                <div class="form-group">
                <label class="dndk">Tên người dùng:</label>
                <input type="text" class="form-control" placeholder="Tên người dùng" value="" name="name" required="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   
    
  </dialog>
  <script>

  var y = document.getElementById("dangki"); 
  
  function showdangki() { 
    y.show(); 
  } 
  
  function closedangki() { 
    y.close(); 
  } 
  </script> 
  
  <dialog id="dangnhap" class="formdangnhap">   
      <div style="display:flex;">
        <h2>Đăng nhập  </h2>
        
        <button style="margin-left: auto;" onclick="closedangnhap()">Đóng</button>
      </div>
      <form action="?login" method="post">
          <div class="form-group">
            <label class="dndk">User :</label>
            <input type="text" class="form-control" placeholder="Tài khoản" value="" name="user" required="">
          </div>
          <div class="form-group">
            <label class="dndk">Password:</label>
            <input type="password" class="form-control" placeholder="Nhập pass" value="" name="pass" required="">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   
    
  </dialog>
  <script>

  var dangnhap = document.getElementById("dangnhap"); 
  
  function showdangnhap() { 
    dangnhap.show(); 
  } 
  
  function closedangnhap() { 
    dangnhap.close(); 
  } 
  </script> 
  <a class="nav-link" type="button" onclick="showdangnhap()">Đăng nhập</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" type="button" onclick="showdangki()">Đăng kí</a>
                          </li>
                </ul>  
            </div>
          </div>
        </nav>
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
        <div class="truyen">
    <div class="container">
        <br>
        
   <div class="search">
    <form action="timkiem.php" method="GET">
        <div class="search-right">
            <input style="border-radius:5px;padding-left:10px;width:290px;" placeholder="Nhập tên cần tìm" type="text" name="search">
            <button style="border: 0;background-color: transparent;"><i class="fa fa-search" aria-hidden="true" style="color:#00CED1"></i></button>
        </div>
    </form>
  </div> 
           <div class="tieude">
            <div class="tieude1">
                <p>
                    Có hai con mèo ngồi bên cửa sổ &gt; Chương 2 
                </p>
                <div class="muclucchuong">
                    
                                    <a href="noidungchuong.php?chuong=53">&lt; Chương trước </a>
                                    <a href="chitiettruyen.php">Mục lục</a>
                                    
                                                </div>
            </div>
            <hr style="margin: 0;">
        </div>
        <br>
            <div class="tentua">
                <b class="tentua1">Có hai con mèo ngồi bên cửa sổ</b>
                <p style="margin: 0;">Chương 2</p>
                <p> Tác giả: <a href="">Nguyễn Nhật Ánh</a></p>
            </div>
        <br>
        <br>
        <div>
            <div class="noidungne">

            </div>
        </div>
        <br>
        <br>
        <div>
            <div class="cuoi">
            
                            <a class="ct" href="noidungchuong.php?chuong=53">&lt; Chương trước </a>
                            <a class="ct" href="chitiettruyen.php">Mục lục</a>
                            
                                    </div>
        </div>
        <br>
        <br>
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
    </div>
</div>
<script src="admin.js"></script>
          <footer style="background-color:#27c6da;height: 50px;"><p></p></footer>
        </div>
      
    
   


</body></html>