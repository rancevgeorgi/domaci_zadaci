<?php
    require_once "connection.php";
    require_once "header.php";  

    if (empty($_SESSION['id'])) {
        header('Location: login.php');
    }
   
        $id = $_SESSION['id']; 

        $pass =  $newPass = $repeatNewPass = "";
        $passErr = $newPassErr = $repeatNewPassErr = "";
        $prikazi = true;
        

       
        $q = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($q);
        $red = $result->fetch_assoc();
        $pass = $red['pass'];
        $q1 = "SELECT pass FROM users WHERE id = $id";
        $result1 = $conn->query($q1);
        $red1 = $result1->fetch_assoc();
        $passDB = $red1['pass'];
        $numRows = $result1->num_rows; //br redova
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pass = $_POST['pass'];
            $newPass = $_POST['newPass'];
            $repeatNewPass = $_POST['repeatNewPass'];
            if ($passDB != md5($_POST['pass'])) {
                $prikazi = false;
                $passErr = "ne postoji korisnimk sa takvim pasvordom";
            }
           
            // password validation
            if (empty($_POST["newPass"])) {
                $prikazi = false;
                $newPassErr = "morate uneti sifru";
            } elseif (!preg_match("/^[a-zA-Z\-]+$/", $_POST["pass"])) {
                $prikazi = false;
                $newPassErr = "password može sadržati samo slova i karaktere";
            } elseif ($_POST["newPass"] != $_POST["repeatNewPass"]) {
                $prikazi = false;
                $newPassErr = "passwordi se ne poklapaju";
            }
            else {
                $newPass = $conn->real_escape_string(md5($_POST["newPass"]));
            }
        }   

 ?>
 
        
        <div>
            <h1 class="text-center bg-primary text-white">Change your password</h1>
            <form action="#" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group"> 
                                <lebel class="text-info">old password:</lebel>
                                <input class="form-control" type="password" name="pass" value="">
                                <span class="text-danger">* <?php echo $passErr; ?></span>
                            </div>
                            <div class="form-group"> 
                                <lebel class="text-info"> new password:</lebel>
                                <input class="form-control" type="password" name="newPass" value="">
                                <span class="text-danger">* <?php echo $newPassErr; ?></span>
                            </div>
                            <div class="form-group"> 
                                <lebel class="text-info">retype password:</lebel>
                                <input class="form-control" type="password" name="repeatNewPass" value="">
                                <span class="text-danger">* <?php echo $repeatNewPassErr; ?></span>
                            </div>
                            <input class="btn btn-primary" type="submit" name="change" value="change password">
                        </div>    
                        <div class="col-sm-4">
                        <?php
                                 if ($prikazi == true){
                                  echo "<h2>Uneli ste podatke: </h2>";
                                    echo "<p>Old password: ". $pass . "</p>";
                                    echo "<p>New password: ". $newPass . "</p>";
                                    echo "<p>Repeat pass: ". $repeatNewPass . "</p>";
                                        if (isset($_POST['change'])) {
                                            $q = "UPDATE users
                                            SET pass = '$newPass'
                                            WHERE id = $id;";
                                            if($conn->query($q)) {
                                                echo "<p class='text-success'>Password sucessfuly changed</p>";
                                            } else {
                                                echo "<p class='text-danger'>Error changing password: " . $conn->error . "</p>";
                                            }
                                        }                                      
                                } 
                                ?> 
                        </div>
                    </div>
                </div>  
            </form>
        </div>  
         