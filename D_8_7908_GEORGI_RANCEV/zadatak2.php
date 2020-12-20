<?php
    $year = date("Y");
    $godRodj = 2003;
    if($year - $godRodj >= 18){
        echo "<p>Osoba je punoletna</p>";
    }
    else{
        echo "<p>Osoba je maloletna</p>";
    }
?>