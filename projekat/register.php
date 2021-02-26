<?php require_once "connection.php";
/* require_once "header.php"; */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $name = $surname = $gender = $date = $user = $pass = $retypePass = "";
        $nameErr = $surnameErr = $dateErr = $userErr = $passErr = $retypePassErr ="";
        $prikazi = true;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'];
            $date = $_POST['date'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $retypePass = $_POST['retypePass'];
            // name validation
            if (empty($_POST["name"])) {
                $prikazi = false;
                $nameErr = "morate uneti ime";
            } elseif (ctype_alpha(str_replace(' ', '', $name))==false && preg_match('/[ĐđŽžĆćČčŠš]/m',$name)==false) {
                $prikazi = false;
                $nameErr = "ime može sadržati samo slova";
            } else {
                $name = $conn->real_escape_string($_POST["name"]);
            }

            // surname validation
            if (empty($_POST["surname"])) {
                $prikazi = false;
                $surnameErr = "morate uneti prezime";
            } elseif (ctype_alpha(str_replace(' ', '', $surname))==false && preg_match('/[ĐđŽžĆćČčŠš]/m',$surname)==false) {
                $prikazi = false;
                $surnameErr = "prezime može sadržati samo slova";
            }
            else {
                $surname = $conn->real_escape_string($_POST["surname"]);
            }

            // date validation
            if (empty($_POST["date"])) {
                $prikazi = false;
                $dateErr = "morate uneti datum";
            } elseif ($_POST["date"] < "1900-01-01") {
                $prikazi = false;
                $dateErr = "neispravan datum";
            } else {
                $date = $conn->real_escape_string($_POST["date"]);
            }

            // username validation
            if (empty($_POST["user"])) {
                $prikazi = false;
                $userErr = "morate uneti korisnicko ime";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["user"])) {
                $prikazi = false;
                $userErr = "username može sadržati samo slova i karaktere";
            }
            else {
                $user = $conn->real_escape_string($_POST["user"]);
            }
            
           /*  $userCheckQuery = "SELECT * FROM users WHERE username = $user LIMIT 1";
            $result = $conn->query($userCheckQuery);
            if ($result > 0) {
                $userErr = "Username already exists";
            } */

            // password validation
            if (empty($_POST["pass"])) {
                $prikazi = false;
                $passErr = "morate uneti sifru";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["pass"])) {
                $prikazi = false;
                $passErr = "password može sadržati samo slova i karaktere";
            } else {
                $pass = $conn->real_escape_string(md5($_POST["pass"]));
            }

            // retypePassword validation
            if (empty($_POST["retypePass"])) {
                $prikazi = false;
                $retypePassErr = "morate uneti sifru";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["retypePass"])) {
                $prikazi = false;
                $passErr = "password može sadržati samo slova i karaktere";
            } elseif ($_POST["retypePass"] != $_POST["pass"]) {
                $prikazi = false;
                $passErr = "passwordi se ne poklapaju";
            }
            else {
                $retypePass = $conn->real_escape_string(md5($_POST["retypePass"]));
            }

            // gender validation
            $gender = $conn->real_escape_string($_POST["gender"]);
        }

    ?>
<div>
    <h1 class="text-center bg-primary text-white">Fill in your details</h1>
    <form action="#" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">  
                        <lebel class="text-info">Name:</lebel>
                        <input class="form-control" type="text" name="name" value="<?php echo $name ?>" placeholder="type your name" >
                        <span class="text-danger">* <?php echo $nameErr; ?></span>
                    </div> 
                    <div class="form-group">
                        <lebel class="text-info">Surname:</lebel>
                        <input class="form-control" type="text" name="surname" value="<?php echo $surname ?>" placeholder="type your surname" pattern= "[a-zA-Z]+[ ][a-zA-Z]+{1,50}" maxlength="50">
                        <span class="text-danger">* <?php echo $surnameErr; ?></span>
                    </div> 
                    <div class="form-group"> 
                        <label class="text-info"> Your gender:</label>
                        <input class="form-control" type="radio" name="gender" value="m" > male
                        <input class="form-control" type="radio" name="gender" value="f"> female
                        <input class="form-control" type="radio" name="gender" value="o" checked> other
                    </div>
                    <div class="form-group"> 
                        <lebel class="text-info">Date of birth:</lebel>
                        <input class="form-control" type="date" name="date" value="<?php echo $date ?>" >
                        <span class="text-danger">* <?php echo $dateErr; ?></span>
                    </div>
                    

                </div>

                <div class="col-sm-4">

                    <div class="form-group">
                        <lebel class="text-info">username:</lebel>
                        <input class="form-control" type="text" name="user" value="<?php echo $user ?>">
                        <span class="text-danger">* <?php echo $userErr; ?></span>
                    </div> 
                    <div class="form-group"> 
                        <lebel class="text-info">password:</lebel>
                        <input class="form-control" type="password" name="pass" value="">
                        <span class="text-danger">* <?php echo $passErr; ?></span>
                    </div>
                    <div class="form-group">
                        <lebel class="text-info">retype password:</lebel>
                        <input class="form-control" type="password" name="retypePass" value="">
                        <span class="text-danger">* <?php echo $passErr; ?></span>
                    </div> 
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                        <h3><a href="login.php" class="nav-link text-success">Go to login page</a></h3>
                    
                </div> 

                <div class="col-sm-4">

                <?php
                    if ($prikazi == true) {
                      
                        
                        if (isset($_POST['submit'])) {
                            $q = "INSERT INTO `users`(`username`, `pass`) 
                             VALUES ('$user', '$pass');";
               
                            if($conn->query($q)) {
                                $q = "SELECT `id` 
                                    FROM `users` 
                                    WHERE `username` LIKE '$user'";

                                $result = $conn->query($q);
                                $red = $result->fetch_assoc();
                                $id = $red['id'];

                                $q = "INSERT INTO `profiles`(`name`, `surname`, `gender`, `dob`, `user_id`) 
                                    VALUES ('$name', '$surname', '$gender', '$date', '$id')";

                                    if($conn->query($q)) {
                                        echo "<p class='text-success'>Successfully registration</p>";
                                    }
                                    else {
                                        echo "<p class='text-danger'>Error adding profile in table profiles: " . $conn->error . "</p>";
                                    }
                            }
                            else {
                                echo "<p>Error adding user in table users: " . $conn->error . "</p>";
                            }

                            $name = $surname = $gender = $date = $user = $pass = $retypePass = "";
                            $nameErr = $surnameErr = $dateErr = $userErr = $passErr = $retypePassErr = "";
                        }
                    } 
                                
                        
                ?>
                    
                </div> 
            </div>
        </div>  
    </form>
</div>      

    
</body>
</html>