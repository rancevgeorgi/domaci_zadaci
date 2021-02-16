<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$db = "videoteka";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Error connecting to database:" . $conn->connect_error);
}