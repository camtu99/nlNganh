<?php 
echo $gioithieu;
foreach ($mucluc as $value) {
    echo 'muckuc. <br>';
    echo $value->ten_chuong.'<br>';
}
echo $truyen[0]->ten_truyen;

 ?>
 {{-- <form action="{{URL::to('inserttruyen')}}" method="post">
    <input type="text"  name="li">
    <input type="submit" value="Submit">
</form> --}}