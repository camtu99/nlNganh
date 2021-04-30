@extends('layouttruyen')
@section('content')
     
    <div style="background-color: #b4d8ff8c;padding: 40px;">
        <div >
            <form action="{{URL::to('user/login')}}" method="post">
                @csrf
                <div style="margin:0 40px"><h2>Đăng nhập:</h2></div>
                <div style="display: flex; width: 100%;padding: 20px 30px;">
                    <p style=" width: 20%;">Email:</p>
                    <input style=" width: 80%;" type="email" id="fname" name="email">
                </div>
                <div style="display: flex; width: 100%;padding: 20px 30px;">
                    <p style=" width: 20%;">Password:</p>
                    <input style=" width: 80%;" type="password" id="lname" name="matkhau">
                </div>
                <div style="text-align: center"><button type="submit"class="btn btn-info">Đăng nhập</button></div>
            </form>
        </div>
    </div>
@endsection 