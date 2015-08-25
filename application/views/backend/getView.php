<?php
if(isset($result)) {
    
    echo '{"products":[';
    $frstTymCmm = TRUE;
    foreach($result as $row) {
        if($frstTymCmm) { $frstTymCmm = FALSE;}
        else {echo ',';}
        echo '{';
        $frstTym = TRUE;
        foreach($row as $key => $value) {
            if($frstTym) { $frstTym = FALSE;}
            else {echo ',';}
            if($key == 'ImageSource') {
                $value = "<a href='" . base_url() . "asset/uploads/" . $value."'>".$value."</a>";
            }
            echo '"'.$key.'"'.':'.'"'.$value.'"';
        }
        echo '}';
    }
    echo ']}';
}