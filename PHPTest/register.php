<?php require_once "connection.php"; ?>
<?php
        $name = $email = $gender = $pass = $retypePass = "";
        $nameErr = $emailErr = $passErr = $retypePassErr ="";
        $show = true;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $retypePass = $_POST['retypePass'];

            // name validation
            if (empty($_POST["name"])) {
                $show = false;
                $nameErr = "enter name";
            } elseif (ctype_alpha(str_replace(' ', '', $name))==false) {
                $show = false;
                $nameErr = "name can contain only letters";
            } else {
                $name = $conn->real_escape_string($_POST["name"]);
            }

            // email validation
            if (empty($_POST["email"])) {
                $show = false;
                $emailErr = "enter email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $show = false;
                $emailErr = "Invalid email format";
            }
            else {
                $email = $conn->real_escape_string($_POST["email"]);
            }

       
            // password validation
            if (empty($_POST["pass"])) {
                $show = false;
                $passErr = "enter password";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["pass"])) {
                $show = false;
                $passErr = "password can containt only letters and caracters";
            } else {
                $pass = $conn->real_escape_string(md5($_POST["pass"]));
            }

            // retypePassword validation
            if (empty($_POST["retypePass"])) {
                $show = false;
                $retypePassErr = "enter password";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["retypePass"])) {
                $show = false;
                $passErr = "password can containt only letters and caracters";
            } elseif ($_POST["retypePass"] != $_POST["pass"]) {
                $show = false;
                $passErr = "passwords do not match";
            }
            else {
                $retypePass = $conn->real_escape_string(md5($_POST["retypePass"]));
            }          
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            Name:
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
        </p>
        <p>
            Password:
            <input type="password" name="pass">
            <span class="error">* <?php echo $passErr; ?></span>
        </p>
        <p>
            Retype password:
            <input type="password" name="retypePass">
            <span class="error">* <?php echo $retypePassErr; ?></span>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>

    <?php
        if ($show == true) { 
            if (isset($_POST['submit'])) {
                $query = "INSERT INTO `users`(`name`, `password`, `email`) 
                    VALUES ('$name', '$pass', '$email');";
                $query = $conn->query($query); }                    
        }
    ?>                         

</body>
</html>