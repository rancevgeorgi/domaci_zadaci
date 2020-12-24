<?php

    $num = 99;
    $test = 99;
    $sum = 0;
    while ((int)$num > 0){
        $sum = $sum + ($num % 10);
        $num = $num / 10;
    }
    if ($test < 10) {
        echo "<span style='border:orange 2px solid'>$sum<span/>";
    }
    if ($test >= 10) {
        echo "<span style='border:blue 2px solid'>$sum<span/>";
    }
   
    

?>