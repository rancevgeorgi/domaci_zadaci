<?php

    $dan = date("w");
    $sat = date("G");
    

    if ($dan == 6 || $dan == 0){
        if ($sat >= 10 && $sat < 18){ 
        echo "Butik je otvoren";
        }
        else
        {
        echo "Butik je zatvoren";
        }
    }
    else{
        if ($sat >= 9 && $sat < 20)
        {
        echo "Butik je otvoren";
        }
        else{
        echo "Butik je zatvoren";
        }
    }

?>