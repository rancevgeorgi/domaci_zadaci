<?php 
    session_start();
    require_once "connection.php"; 

    $id = $_SESSION['id']; 

    $sql1 = "SELECT * FROM users WHERE id = '$id'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $_SESSION['name'] = $row1['name'];
    $userName = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>
    <form action="results.php" method="post">
        <input type="search" id="search" name="search">
        <input type="submit">
    </form>
    <h1> <?php echo "Welcome, " . $userName;?> </h1>
</body>
</html>