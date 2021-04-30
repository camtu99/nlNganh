@extends('layouttruyen')
@section('content')
    <div>
        <h3>Thông tin xác thực email đã gửi về email</h3>
        <p>Vui lòng kiểm tra và xác nhận để hoàn tất nhu cầu đăng kí cho trang.</p>
        <br><br>
        <a name="" id="" class="btn btn-primary" href="/send-mail/{{$id}}/{{$email}}" role="button">Gửi lại</a>
    </div>
@endsection