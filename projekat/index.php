<?php 
    session_start();
    require_once "connection.php";
  
    /* if (!empty($_SESSION['id'])) {
        header('Location: followers.php');
    } */
    if (!empty($_SESSION['id'])){
        $userName = $_SESSION['name'];
        $userSurname = $_SESSION['surname'];
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <a href="" class="navbar-brand">Social network</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="register.php" class="nav-link">Register</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid bg-secondary">
        <div class="row">
            <div class="col-sm-8 p-5">
            <?php if (!empty($_SESSION['id'])) {
                echo "<h2 class='text-center text-white'>Hello, " . $userName . " " . $userSurname . "</h2>";
                } ?>
            <h1 class="display-1">Welcome to our social network</h1>
            <?php if (!empty($_SESSION['id'])) {
                echo "<h2><a class='nav-link text-white' href='followers.php'>Explore your friends</a></h2>";
                } ?>
            </div>
            <div class="col-sm-4">
                <img src="brand.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>