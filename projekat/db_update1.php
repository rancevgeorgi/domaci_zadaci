<?php
    require_once "connection.php";

   

    $query = "ALTER TABLE  profiles ADD bio TEXT";

    

    if ($conn->query($query)){
        echo "<p>Uspešno dodat red</p>";
    }
    else {
        "<p>Greška prilikom dodavanja</p>";
    }
