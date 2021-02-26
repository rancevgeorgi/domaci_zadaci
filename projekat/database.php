<?php
    require_once "connection.php";

    $query = "CREATE TABLE IF NOT EXISTS users(
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
        username  VARCHAR(50) UNIQUE NOT NULL,
        pass VARCHAR(255) NOT NULL
        )
        ENGINE = InnoDB; ";

    $query .= "CREATE TABLE IF NOT EXISTS profiles(
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        gender CHAR(1),
        dob DATE,
        user_id INT UNSIGNED,
        FOREIGN KEY (user_id) REFERENCES users(id)
        )
        ENGINE = InnoDB;";
    
    $query .= "CREATE TABLE IF NOT EXISTS followers(
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        sender_id INT UNSIGNED NOT NULL,
        reciver_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (sender_id) REFERENCES users(id),
        FOREIGN KEY (reciver_id) REFERENCES users(id)
        )
        ENGINE = InnoDB;";

    if($conn->multi_query($query)){
        echo "<p>Uspesno su dodate tabele</p>";
    }
    else{
        echo "Error: " . $query. "<br>" . $conn->error;
    }

