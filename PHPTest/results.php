<?php
session_start();
require_once "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Results</title>
</head>
    <body>
        <?php
        if (!empty($_SERVER["REQUEST_METHOD"] == "POST")) {  
            $search = $conn->real_escape_string($_REQUEST['search']);
            $sql = "SELECT * FROM users WHERE name LIKE '%".$search."%'"; 
            $query = $conn->query($sql); 
            $row = $query->fetch_assoc();
            foreach ($query as $row){  
            echo 'Name: ' .$row['name'] . "<br>";   
            }  
        }
        ?>
        <a href = "index.php">Back to home page</a>
    </body>
</html>