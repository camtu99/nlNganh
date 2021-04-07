<?php 
 foreach ($tentruyen as $value) {
        echo $value->truyen_id;
        echo '<br><br>';
        echo $value->ten_truyen;
        echo '<br><br>';
        echo $value->link_truyen;
        echo '<br><br>';
        echo $value->luot_doc;
        echo '<br><br>';
        echo $value->ten_tac_gia;
        echo '<br><br>';
    }



 ?>
 {{-- <form action="{{URL::to('inserttruyen')}}" method="post">
    <input type="text"  name="li">
    <input type="submit" value="Submit">
</form> --}}