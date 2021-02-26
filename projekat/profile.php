<?php 
    require_once "header.php"; 
    require_once "connection.php";

    if (!empty($_SESSION['id'])){
        $userName = $_SESSION['name'];
        $userSurname = $_SESSION['surname'];
    }

    echo "<h2 class='text-center bg-primary text-white'>Hello, " . $userName . " " . $userSurname . "</h2>";
    
 ?>

 <?php

    $id = $_SESSION['id']; 

    $q = "SELECT users.id, profiles.name, profiles.surname, users.username, profiles.gender, profiles.dob, profiles.bio
          FROM profiles
          INNER JOIN users
          ON profiles.user_id = users.id
          WHERE profiles.user_id = $id;";
    $result = $conn->query($q);

    ?>

<div class="container">
        <?php
            if (!$result->num_rows) {
                echo "<p class='text-danger emptyDb'>Nema podataka u bazi</p>";
            }      
            else{
                
                foreach ($result as $row){
                    $color = "";
                    if ($row['gender'] == 'm') {
                        $color = "blue";
                    } elseif ($row['gender'] == 'f') {
                        $color = "pink";
                    } else {
                        $color = "gray";
                    }
                echo "<table class='table table-bordered table-info  $color'>";
                
                    echo "
                    <tr>
                        <td>First name</td>
                        <td>" . $row['name'] . "</td>
                    </tr>";
                    echo "
                    <tr>
                        <td>Last name</td>
                        <td>" . $row['surname'] . "</td>
                    </tr>";
                    echo "
                    <tr>
                        <td>Username</td>
                        <td>" . $row['username'] . "</td>
                    </tr>";
                    echo "
                    <tr>
                        <td>Date of birth</td>
                        <td>" . $row['dob'] . "</td>
                    </tr>";
                    echo "
                    <tr>
                        <td>Gender</td>
                        <td>" . $row['gender'] . "</td>
                    </tr>";
                    echo "
                    <tr>
                        <td>About me</td>
                        <td>" . $row['bio'] . "</td>
                    </tr>";
                }
                echo" </table>";
                echo "</div>";
                   
            }
    ?>          
            <?php 
                echo "<h2><a class='nav-link text-primary' href='followers.php'>Explore your friends</a></h2>";
            ?>

