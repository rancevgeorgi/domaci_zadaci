<?php
require_once "connection.php";

$query = "CREATE TABLE reziseri(
    id INT UNSIGNED PRIMARY KEY,
    ime VARCHAR(50), 
    prezime VARCHAR(50), 
    pol CHAR(1)   
    )
    ENGINE = InnoDB;
    ";
$query .= "CREATE TABLE filmovi(
    id INT UNSIGNED PRIMARY KEY,
    naslov VARCHAR(50), 
    godina SMALLINT UNSIGNED, 
    ocena DECIMAL(6,2), 
    reziser_id INT UNSIGNED,
    FOREIGN KEY(reziser_id) REFERENCES reziseri(id)
    )
    ENGINE = InnoDB; 
    ";
$query .= "CREATE TABLE zanrovi(
    id INT UNSIGNED PRIMARY KEY, 
    naziv VARCHAR(50)
    )
    ENGINE = InnoDB;
    ";
$query .= "CREATE TABLE film_zanr(
    film_id INT UNSIGNED, 
    zanr_id INT UNSIGNED, 
    FOREIGN KEY(film_id) REFERENCES filmovi(id), 
    FOREIGN KEY(zanr_id) REFERENCES zanrovi(id), 
    PRIMARY KEY(film_id, zanr_id)
    )
    ENGINE = InnoDB; 
    ";

if($conn->multi_query($query)){
    echo "<p>Uspesno su dodate tabele</p>";
}
else{
    echo "Error: " . $query. "<br>" . $conn->error;
}



