<!doctype html>
<html lang="en">
  <head>
    <title>Quản lý Nhã Các</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    {{-- Khung hộp thoại --}}
    <div>
        @include('error')
        <div class="row admin">
            <div class="col-md-2" style="padding-right: 0">
                <div class=" khung-admin">
                    <p class="khung-item"><a href="/admin/thongtin">Quản lý tài khoản</a></p>
                    <p class="khung-item"><a href="/admin/truyen">Quản lý truyện</a></p>
                    <p class="khung-item"type="button" ><a href="#cubao"data-toggle="collapse" aria-expanded="false">Cử báo</a></p>
                    <p class="khung-item" type="button" id="cubao"class="collapse"><a href="/admin/cubao/truyen">Cử báo truyện</a></p>
                    <p class="khung-item" type="button" id="cubao"class="collapse"><a href="/admin/cubao/taikhoan">Cử báo tài khoản</a></p>
                    <p class="khung-item"><a href="">Quản lí thông báo</a></p>
                    <p class="khung-item"><a href="/admin/thongke">Thống kê</a></p>
                </div>
            </div>
            <div class="col-md-10">
                <div>
                    @section('content')
                        
                    @show
                </div>
            </div>
        </div>
    </div>





</body>
</html>