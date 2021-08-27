@extends('layouttruyen')
@section('content')
@isset($user)
  <form action="doimatkhau/{{$user->email}}" method="post">
    @csrf
    <div style="display:flex;margin:10px">
      <label for="fname" style="width:30%;">Email: {{$user->email}}</label><br>
    </div>
    <div style="display:flex;margin:10px"> 
      <label for="lname" style="width:30%">Mật khẩu mới:</label><br>
      <input type="password" id="lname" name="pass" style="width:80%">
    </div>
    <div style="display:flex;margin:10px"> 
      <label for="lname" style="width:30%">Nhập lại mật khẩu mới:</label><br>
      <input type="password" id="lname" name="repass"style="width:80%">
    </div>
    <input type="submit" value="Submit" style="width:100%;margin-top:10px;">
  </form> 
@endisset
@empty($user)
<div style="    background-color: aliceblue;
padding: 80px;">
  <form action="datlaipass" method="get">
    @csrf
    <div style="display:flex;margin:10px">
      <label for="fname" style="width: 50%;">Email cần đặt lại mật khẩu:</label><br>
      <input type="email" id="fname" name="email"style="width:80%">
    </div>
    <input type="submit" value="Submit" style="width:100%;margin-top:10px;">
  </form>
</div> 
@endempty


@endsection