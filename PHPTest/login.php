<?php

    session_start();
    require_once "connection.php";
    $emailErr = $passErr = "*";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $val = true;
        if (empty($email)) {
            $val = false;
            $emailErr = "email can not be empty";
        }
        if (empty($pass)) {
            $val = false;
            $passErr = "Password can not be empty";
        }
        if ($val) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $userErr = "Error logging you in.";
            }
            else{
                $row = $result->fetch_assoc();
                $dbPass = $row['password'];
                if ($dbPass != md5($pass)) {
                    $passErr = "Incorrect password";
                }
                else {
                    $_SESSION['id'] = $row['id'];  
                   header('Location: index.php');
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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="post">
        <p>
            Enter your email:
            <input type="email" name="email" value="<?php echo $email; ?>">
            <span class="error">* <?php echo $emailErr; ?></span>
        </p>
        <p>
            Password:
            <input type="password" name="pass">
            <span class="error">* <?php echo $passErr; ?></span>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>
</body>
</html>