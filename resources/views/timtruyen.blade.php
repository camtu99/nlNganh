@extends('layouttruyen')
@section('content')
    <div>
        <form action="/truyen/timnangcao" method="post">
            @csrf
            <DIV>
                <div>Tình trạng:</div>
                <div>
                    <div>
                        <input type="checkbox" name="1" value="1" id="">
                        <label for="">Hoàn</label>
                    </div>
                    <div>
                        <input type="checkbox" name="2" value="2" id="">
                        <label for="">Chưa</label>
                    </div>
                    <div>
                        <input type="checkbox" name="3" value="3" id="">
                        <label for="">Chưa 1</label>
                    </div>
                    <div>
                        <input type="checkbox" name="4" value="4" id="">
                        <label for="">Chưa 4</label>
                    </div>
                    <div>
                        <input type="checkbox" name="5" value="5" id="">
                        <label for="">Chưa 5</label>
                    </div>
                    <div>
                        <input type="checkbox" name="11" value="11" id="">
                        <label for="">Chưa</label>
                    </div>
                </div>
            </DIV>
            <div><button type="submit">Tìm truyện</button></div>
        </form>
    </div>
@endsection