<?php
    //kreiranje objekta konekcije

    $servername = "localhost";
    $username = "admin";
    $passsword = "admin";
    $db = "muzika";

    $conn = new mysqli($servername, $username, $passsword, $db);
    if ($conn->connect_error) {
        die("Error connecting to database:" . $conn->connect_error);
    }
  


?>