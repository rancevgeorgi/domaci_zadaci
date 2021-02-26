<?php
    //otvaranje sesije
    session_start();
    require_once "connection.php";
    $userErr = $passErr = "*";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //korisnik pokusava logovanje
        $user = $conn->real_escape_string($_POST['user']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $val = true;
        if (empty($user)) {
            $val = false;
            $userErr = "Username can not be empty";
        }
        if (empty($pass)) {
            $val = false;
            $passErr = "Password can not be empty";
        }
        if ($val) {
            $sql = "SELECT * FROM users WHERE username = '$user'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $userErr = "This username does not exist!";
            }
            else{
                //postoji username, treba proveriti sifre
                $row = $result->fetch_assoc();
                $dbPass = $row['pass'];
                if ($dbPass != md5($pass)) {
                    $passErr = "Incorrect password";
                }
                else {
                    //logovanje
                    $_SESSION['id'] = $row['id'];  
                    /* $sql1 = "SELECT * FROM profiles WHERE user_id = '$id'";
                    $result1 = $conn->query($sql1);
                    $row1 = $result1->fetch_assoc();
                    $_SESSION['name'] = $row1['name'];
                    $_SESSION['surname'] = $row1['surname'];
                    $userName = $_SESSION['name'];
                    $userSurname = $_SESSION['surname']; */
                   header('Location: followers.php');
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="p-3"> 
        <form action="#" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                    <h3 class="text-center bg-warning text-primary p-2">Log in page</h3>
                        <div class="form-group">  
                            <lebel class="text-info">Username:</lebel>
                            <input class="form-control" type="text" name="user"  >
                        <span class="text-danger">* <?php echo $userErr; ?></span> 
                        </div> 
                        <div class="form-group">
                            <lebel class="text-info">Password:</lebel>
                            <input class="form-control" type="password" name="pass" >
                            <span class="text-danger">* <?php echo $passErr; ?></span>
                        </div> 
                        <input class="btn btn-primary" type="submit" name="submit" value="Login">
                        <span>or</span>
                        <a href="register.php" class="btn btn-success" role="button">Register</a>
                    </div>
                </div>  
            </div> 
        </form>
    </div>  
</body>
</html>