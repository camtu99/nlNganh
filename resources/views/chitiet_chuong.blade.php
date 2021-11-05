@extends('layouttruyen')
@section('content')
<div class="truyen" id="truyen">
    <div class="container">
        <div class="tieude" style="padding-bottom: 1px;">
            <div class="tieude1">
                <p>
                {{$ten}}>>{{$chuong}}
                </p>
                {{-- <div class="muclucchuong">
                    @if (isset($chuongtruoc))
                        <a href="{{$chuongtruoc[0]->ten_chuong}}">Chương trước</a>
                    @endif
                    <a href="chitiettruyen.php">Mục lục</a>
                    @if (isset($chuongke))
                        <a href="{{$chuongke[0]->ten_chuong}}">Chương sau</a>
                    @endif            
                </div> --}}
                <div class="dropdown1">
                    <span>Aa</span>
                    <div class="dropdown-content1">
                        <b:if cond='data:blog.pageType == &quot;item&quot;'>
                            <div class='zoom-in-out tanggiam'>
                            <a href="javascript:ts('body',1)" title="Tăng cỡ chữ">A+</a> 
                            <a href="javascript:ts('body',-1)" title="Giảm cỡ chữ">A-</a>
                            </div>
                        </b:if>
                        <div class="phongnen">
                            <input type="button"id="btn1" style="background-color: rgb(0, 0, 0)" value="Aa">
                            <input type="button"id="btn2" style="background-color:blanchedalmond" value="Aa">
                            <input type="button"id="btn3" style="background-color: #27c6da" value="Aa">
                        </div>
                    </div>
                </div>
                @if (Session::has('email_tk'))
                 <div class="gim"><a href="/bookmark/{{$nd_chuong[0]->noi_dung_chuong_id}}"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                @else
                    <div class="gim"><a href="" type="button"  onclick="myFunction()"><i class="fa fa-plus" aria-hidden="true"></i></a></div> 
                @endif
            </div>
            <div class="tentua">
                <div class="ml-them-dau">
                    @if (isset($chuongtruoc))
                        <a class="ml_them" href="{{$chuongtruoc[0]->ten_chuong}}"> << Chương trước >>  </a>
                    @endif
                    <a class="ml_them" href="/truyen/{{Session::get('id_truyen')}}">Mục lục</a>
                    @if (isset($chuongke))
                        <a class="ml_them" href="{{$chuongke[0]->ten_chuong}}"><< Chương sau >></a>
                    @endif  
                </div>
                <b class="tentua1">{{$ten}}</b>
                <p style="margin: 0;">{{$chuong}}</p>
                <p> Tác giả: <a href="">{{$tacgia[0]->ten_tac_gia}}</a></p>
            </div>
            <div>
                <div class="noidungne">
                    <div class="truyen1"><?php echo $noidung;?></div>
                </div>
            </div>
            <div>
                <div class="cuoi">
                    @if (isset($chuongtruoc))
                        <a class="ct" href="{{$chuongtruoc[0]->ten_chuong}}">Chương trước </a>
                    @endif
                    <a class="ct" href="/truyen/{{Session::get('id_truyen')}}">Mục lục</a>
                    @if (isset($chuongke))
                        <a class="ct" href="{{$chuongke[0]->ten_chuong}}">Chương sau </a>
                    @endif  
                </div>
            </div>
        </div>       
    </div>
</div>
<script>
    var tgs = new Array( 'div','td','tr');
    var szs = new Array( 'xx-small','x-small','small','medium','large','x-large','xx-large' );
    var startSz = 2;
    function ts( trgt,inc ) {
        if (!document.getElementById) return
        var d = document,cEl = null,sz = startSz,i,j,cTags;
        sz += inc;
        if ( sz < 0 ) sz = 0;
        if ( sz > 6 ) sz = 6;
        startSz = sz;
        if ( !( cEl = d.getElementById( trgt ) ) ) cEl = d.getElementsByTagName( trgt )[ 0 ];
        cEl.style.fontSize = szs[ sz ];
        for ( i = 0 ; i < tgs.length ; i++ ) {
            cTags = cEl.getElementsByTagName( tgs[ i ] );
            for ( j = 0 ; j < cTags.length ; j++ ) cTags[ j ].style.fontSize = szs[ sz ];
        }
    }
    var button1 = document.getElementById("btn1");
    var button2 = document.getElementById("btn2");
    var button3 = document.getElementById("btn3");
    var div = document.getElementById('truyen');
    button1.onclick = function () { 
        div.style.color = "#f5f5f5";  
    div.style.background = "rgb(0, 0, 0)";
    };
    button2.onclick = function () {
        div.style.background = "blanchedalmond"; div.style.color = "rgb(0, 0, 0)";
        
    };
    button3.onclick = function () { div.style.color = "rgb(0, 0, 0)";
        div.style.background = "#e9f8fd";
      
    };
    function myFunction() {
        alert("Bạn chưa đăng nhập");
    }
</script>
@endsection
