<?php

    $k = 45;
    $d = 1;
    $deljiv = 0;

    while($d <= $k) {
        if($k % $d == 0 && $d % 3 == 0 && $d % 2 != 0) {
            $deljiv++;
        }
        $d++;
    }
    echo "$deljiv";




?>