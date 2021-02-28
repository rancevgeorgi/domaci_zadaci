<?php 
    require_once "header.php"; 

    if (empty($_SESSION['id'])) {
        header('Location: login.php');
    }
    
    ?>

<?php

    $id = $_SESSION['id']; 

    //ime i prezime ulogovanog korisnika
    $sql1 = "SELECT * FROM profiles WHERE user_id = '$id'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $_SESSION['name'] = $row1['name'];
    $_SESSION['surname'] = $row1['surname']; 
    $userName = $_SESSION['name'];
    $userSurname = $_SESSION['surname']; 

    if (!empty($_GET['follow'])) {
        $friendId = $conn->real_escape_string($_GET['follow']);
    
        $sql = "SELECT * FROM followers
                WHERE sender_id = $id
                AND reciver_id = $friendId";
    
    
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO followers(sender_id, reciver_id )
                    VALUES ($id, $friendId)";
            $result1 = $conn->query($sql);
            if (!$result1) {
           echo "<div class='text-danger'>  Error: " . $conn->error . "</div >";
            }
        }
    }

    if (!empty($_GET['unfollow'])) {
        $friendId = $conn->real_escape_string($_GET['unfollow']);

        $sql = "DELETE FROM followers
                WHERE sender_id = $id
                AND reciver_id = $friendId;";


        $result = $conn->query($sql);
        if (!$result) {
            echo "<div class='text-danger'>  Error: " . $conn->error . "</div >";
        }
    }

    $q = "SELECT users.id, profiles.name, profiles.surname, users.username 
          FROM profiles
          INNER JOIN users
          ON profiles.user_id = users.id
          WHERE profiles.user_id != $id";
          $result = $conn->query($q);

          //ime i prezime ulogovanog korisnika
   /*  $q1 = "SELECT users.id, profiles.name, profiles.surname, users.username 
          FROM profiles
          INNER JOIN users
          ON profiles.user_id = users.id
          WHERE profiles.user_id = $id";
          $result1 = $conn->query($q1); */
         
?>


    <div class="container">
    <!-- foreach ($result1 as $row) {echo "Hello, " . $row['name'] . " " . $row['surname'];} -->
        <h2 class="text-center bg-warning text-white"> <?php echo "Hello, " . $userName . " " . $userSurname;?> </h2>
        <h2 class="text-center bg-warning text-white">Find your friends</h2>
        <?php
            if (!$result->num_rows) {
                echo "<p class='text-danger'>Nema podataka u bazi</p>";
            }      
            else{
                echo "<table class='table table-bordered table-info'>";
                    echo "<thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    </thead>";
                    foreach ($result as $row) {
                        $userId = $row['id'];
                        echo "<tbody>";
                        echo "<tr>";
                        //treba user_id?
                        echo " <td> <a href='profile.php?id=$userId'>"  . $row['name'] . "</a> </td>";
                        echo "  <td>" . $row['surname'] . "</td>";
                        echo "  <td>" . $row['username'] . "</td>";
                        $friendId = $row['id'];

                        // Ispitujemo da li pratim korisnika
                        $sql1 = "SELECT * FROM followers WHERE sender_id = $id AND reciver_id = $friendId";
                        $result1 = $conn->query($sql1);
                        $f1 = $result1->num_rows; // 0 ako ne pratim ili 1 ako pratim korisnika

                        // Ispitujemo da li korisnik prati mene
                        $sql2 = "SELECT * FROM followers WHERE sender_id = $friendId AND reciver_id = $id";
                        $result2 = $conn->query($sql2);
                        $f2 = $result2->num_rows; // 0 ili 1 vrednosti

                        if ($f1 == 0) {
                            if ($f2 == 0) {
                                $text = "Follow";
                            } else {
                                $text = "Follow back";
                            }
                            echo " <td> <a href='followers.php?follow=$friendId'>$text</a> </td>";
                        }
                        else {
                            echo " <td>  <a href='followers.php?unfollow=$friendId'>Unfollow</a> </td>";
                        }
                        
                        echo " </tr>";
                        echo "</tbody>";
                    }
            }    
        
                echo" </table>";
    echo "</div>";


    ?>
