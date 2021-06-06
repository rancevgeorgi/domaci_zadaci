<?php
    require_once "connection.php";

    $query = "CREATE TABLE IF NOT EXISTS users(
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
        name  VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50) UNIQUE NOT NULL
        )
        ENGINE = InnoDB; ";

    $query = $conn->query($query);

    