@extends('layouttruyen')
@section('content')
    <div>
        <h3>Yêu cầu đổi mật khẩu đã gửi về email</h3>
        <p>Vui lòng kiểm tra và xác nhận để hoàn tất nhu cầu đổi mật khẩu mới cho tài khoản.{{$email}}</p>
        <br><br>
        <a name="" id="" class="btn btn-primary" href="/send-mail/" role="button">Gửi lại</a>
    </div>
@endsection