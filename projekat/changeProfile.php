<?php
    require_once "connection.php";
    require_once "header.php";  

    if (empty($_SESSION['id'])) {
        header('Location: login.php');
    }
   
        $id = $_SESSION['id']; 

        $name = $surname = $gender = $date = $bio = "";
        $nameErr = $surnameErr = $dateErr = $bioErr = "";
        $prikazi = true;
        

       
        $q = "SELECT * FROM profiles WHERE profiles.user_id = $id";
        $result = $conn->query($q);
        $red = $result->fetch_assoc();
        $name = $red['name'];
        $surname = $red['surname'];
        $gender = $red['gender'];
        $date = $red['dob'];
        $bio = $red['bio'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'];
            $date = $_POST['date'];
            $bio = $red['bio'];
           
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

            // bio validation NE RADI
            if (empty($_POST["bio"])) {
                $prikazi = false;
                $bioErr = "morate uneti biografiju";
            }  else {
                $bio = $conn->real_escape_string($_POST["bio"]);
            }
        }
      

 ?>

<div>
    <h1 class="text-center bg-primary text-white">Change your profile</h1>
    <form action="#" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">  
                        <lebel class="text-info"> Name:</lebel>
                        <input class="form-control" type="text" name="name" value="<?php echo $name ?>" placeholder= "type your name" >
                        <span class="text-danger"> <?php echo $nameErr; ?></span>
                    </div> 
                    <div class="form-group">
                        <lebel class="text-info">Surname:</lebel>
                        <input class="form-control" type="text" name="surname"  value="<?php echo $surname ?>"  placeholder="type your surname" >
                        <span class="text-danger"> <?php echo $surnameErr; ?></span>
                    </div> 
                    <div class="form-group"> 
                        <label class="text-info"> Your gender:</label>
                        <input class="form-control" type="radio" name="gender" value="m" > male
                        <input class="form-control" type="radio" name="gender" value="f"> female
                        <input class="form-control" type="radio" name="gender" value="o" checked> other
                    </div>
                    <div class="form-group"> 
                        <lebel class="text-info">Date of birth:</lebel>
                        <input class="form-control" type="date" name="date"  value="<?php echo $date ?>" >
                        <span class="text-danger"> <?php echo $dateErr; ?></span>
                    </div>
                    <div class="form-group"> 
                        <label> Biografija:</label>
                        <textarea class="form-control" name="bio" id="" cols="30" rows="10" value="<?php echo $bio ?>">  </textarea>
                        <span class="text-danger">* <?php echo $bioErr; ?></span>
                    </div>
                    <input class="btn btn-primary" type="submit" name="update" value="accept changes">
                </div>    
                <div class="col-sm-4">
                     <?php
                     if ($prikazi == true){
                       /*  echo "<h2>Uneli ste podatke: </h2>";
                        echo "<p>Ime: ". $name . "</p>";
                        echo "<p>Prezime: ". $surname . "</p>";
                        echo "<p>Pol: ". $gender . "</p>";
                        echo "<p>Datum: ". $date . "</p>"; */
                            if (isset($_POST['update'])) {
                                $q = "UPDATE profiles
                                SET name = '$name', surname = '$surname', gender = '$gender', dob = '$date', bio = '$bio'
                                WHERE user_id = $id;";
                                if($conn->query($q)) {
                                    echo "<p class='text-success'>Successfully update</p>";
                                } else {
                                    echo "<p class='text-danger'>Error adding user in table users: " . $conn->error . "</p>";
                                }
                            }
                            
                     }
                    ?>
                </div>
            </div>
        </div>  
    </form>
</div>   

