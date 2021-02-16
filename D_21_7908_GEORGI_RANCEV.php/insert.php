<?php
require_once "connection.php";

$query = "INSERT INTO reziseri(id, ime, prezime, pol)
VALUES
(1, 'Frank', 'Darabont', 'm'), 
(2, 'Francis', 'Coppola', 'm'),
(3, 'David', 'Fincher', 'm'),
(4, 'Robert', 'Zemeckis', 'm'),
(5, 'Quentin', 'Tarantino', 'm');
";
$query .= "INSERT INTO filmovi(id, naslov, godina, ocena, reziser_id)
VALUES
(21, 'The Shawshank Redemption', 1994, 9.3, 1), 
(22, 'The Godfather', 1972, 9.2, 2),
(23, 'Fight Club', 1999, 8.8, 3),
(24, 'Forrest Gump', 1994, 8.8, 4),
(25, 'Pulp Fiction', 1994, 8.9, 5),
(26, 'Inglourious Basterds', 2009, 8.3, 5);
";

$query .= "INSERT INTO zanrovi(id, naziv)
VALUES
(10, 'Drama'),
(11, 'Crime'),
(12, 'Romance');
";

$query .= "INSERT INTO film_zanr(film_id, zanr_id)
VALUES
(21, 10),
(22, 11),
(23, 10),
(24, 12),
(25, 10),
(26, 10);
";

if($conn->multi_query($query)) {
    echo "<p>Uspesno izvrsen unos podataka u tabele</p>";
}
else {
    echo "<p>Greska prilikom izvrsenja niza upita: "
            . $conn->error . "</p>";
}

