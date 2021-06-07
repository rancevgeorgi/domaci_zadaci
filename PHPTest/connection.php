<?php
    $servername = "localhost";
    $username = "admin";
    $passsword = "admin";
    $db = "php_test";
    $conn = new mysqli($servername, $username, $passsword, $db);
    if ($conn->connect_error) {
        die("Error connecting to database:" . $conn->connect_error);
    }  
?>