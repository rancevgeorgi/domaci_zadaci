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


$query = "SELECT reziseri.ime AS 'ime', reziseri.prezime AS 'prezime', filmovi.naslov AS 'film', filmovi.godina AS 'godina', filmovi.ocena AS 'ocena', zanrovi.naziv AS 'zanr'
FROM reziseri
INNER JOIN filmovi
ON filmovi.reziser_id = reziseri.id
INNER JOIN film_zanr
ON filmovi.id = film_zanr.film_id
INNER JOIN zanrovi
ON film_zanr.zanr_id = zanrovi.id
WHERE ocena = (select max(ocena) FROM filmovi)
ORDER BY  film ASC
";

$result = $conn->query($query);
    if (!$result->num_rows) {
        echo "<p class='info'>Nema podataka u bazi</p>";
    }
    else {
        echo "<table class='tabela'>";
        echo "<tr>
            <th>Naziv filma</th>
            <th>Ime rezisera</th>
            <th>Prezime rezisera</th>
            <th>godina</th>
            <th>ocena</th>
            <th>zanr</th>
            </tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['film'] . "</td>";
            echo "<td>" . $row['ime'] . "</td>";
            echo "<td>" . $row['prezime'] . "</td>";
            echo "<td>" . $row['godina'] . "</td>";
            echo "<td>" . $row['ocena'] . "</td>";
            echo "<td>" . $row['zanr'] . "</td>";
            echo  "</tr>";
        }
        echo "</table>";
    }  

    echo"<br>";

    echo "<button><a href='index.php'>Vrati se na početnu stranicu</a></button>";

    ?>
</body>
</html>