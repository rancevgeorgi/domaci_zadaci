<?php require_once "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php


$query = "SELECT reziseri.ime AS 'ime', reziseri.prezime AS prezime
FROM reziseri
";
$result = $conn->query($query);
    if (!$result->num_rows) {
        echo "<p class='info'>Nema podataka u bazi</p>";
    }
    else {
        foreach($result as $row) {
            $reziser = $row['ime'] ." ". $row['prezime'];
            $imeRezisera = $row['ime'];
            echo "<h3>". $reziser ."</h3>"; 
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv filma</th>
                <th>Zanr</th>
                <th>godina</th>
                <th>ocena</th>
                </tr>";
            $query = "SELECT reziseri.ime AS 'ime', reziseri.prezime AS 'prezime', filmovi.naslov AS 'film', filmovi.godina AS 'godina', filmovi.ocena AS 'ocena', zanrovi.naziv AS 'zanr'
            FROM reziseri
            INNER JOIN filmovi
            ON filmovi.reziser_id = reziseri.id
            INNER JOIN film_zanr
            ON filmovi.id = film_zanr.film_id
            INNER JOIN zanrovi
            ON film_zanr.zanr_id = zanrovi.id
            WHERE reziseri.ime LIKE '$imeRezisera'
            ";
            $result = $conn->query($query);
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['film'] . "</td>";
                echo "<td>" . $row['zanr'] . "</td>";
                echo "<td>" . $row['godina'] . "</td>";
                echo "<td>" . $row['ocena'] . "</td>";
                echo  "</tr>";
            }
            echo "</table>";
        }
    }  

    echo"<br>";

    echo "<button><a href='index.php'>Vrati se na početnu stranicu</a></button>";

    ?>
</body>
</html>