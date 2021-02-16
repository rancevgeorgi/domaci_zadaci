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


echo"<p>Tabelarno prikazati sve informacije o svim filmovima iz tabele filmovi (zajedno sa režiserom i žanrovima), abecedno po nazivu filma.</p>"; 

$query = "SELECT reziseri.ime AS 'ime', reziseri.prezime AS 'prezime', filmovi.naslov AS 'film', filmovi.godina AS 'godina', filmovi.ocena AS 'ocena', zanrovi.naziv AS 'zanr'
FROM reziseri
INNER JOIN filmovi
ON filmovi.reziser_id = reziseri.id
INNER JOIN film_zanr
ON filmovi.id = film_zanr.film_id
INNER JOIN zanrovi
ON film_zanr.zanr_id = zanrovi.id
ORDER BY film
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

echo"<p>Tabelarno prikazati sve informacije o najbolje rangiranim filmovima, abecedno po nazivu filma.</p>";

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

echo"<p>Za svaki žanr koji postoji u bazi prikazati po jednu tabelu, a u svakoj tabeli informacije o filmovima koji pripadaju tom žanru, abecedno po nazivu filma.</p>";

$query = "SELECT zanrovi.naziv AS 'zanr'
FROM zanrovi
";
$result = $conn->query($query);
    if (!$result->num_rows) {
        echo "<p class='info'>Nema podataka u bazi</p>";
    }
    else {
        foreach($result as $row) {
            $zanr = $row['zanr'];
            echo "<h3>". $row['zanr'] ."</h3>";
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv filma</th>
                <th>Ime rezisera</th>
                <th>Prezime rezisera</th>
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
            WHERE zanrovi.naziv LIKE '$zanr'
            ORDER BY film
            ";
            $result = $conn->query($query);
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['film'] . "</td>";
                echo "<td>" . $row['ime'] . "</td>";
                echo "<td>" . $row['prezime'] . "</td>";
                echo "<td>" . $row['godina'] . "</td>";
                echo "<td>" . $row['ocena'] . "</td>";
                echo  "</tr>";
            }
            echo "</table>";
        }
    }  

echo"<p>Za svakog režisera prikazati po jednu tabelu, a u svakoj tabeli informacije o svim filmovima koje je režirao dati režiser.</p>";

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

echo"<p>Za svaku godinu koja postoji u bazi prikazati po jednu tabelu, a u svakoj tabeli informacije o filmovima koji su izašli te godine, abecedno po imenu režisera.</p>";

$query = "SELECT DISTINCT filmovi.godina AS 'godina'
FROM filmovi
";
$result = $conn->query($query);
    if (!$result->num_rows) {
        echo "<p class='info'>Nema podataka u bazi</p>";
    }
    else {
        foreach($result as $row) {
            $godina = $row['godina'];
            echo "<h3>". $godina ."</h3>"; 
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Naziv filma</th>
                <th>Zanr</th>
                <th>ime rezisera</th>
                <th>prezime rezisera</th>
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
            WHERE filmovi.godina LIKE '$godina'
            ORDER BY ime
            ";
            $result = $conn->query($query);
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['film'] . "</td>";
                echo "<td>" . $row['zanr'] . "</td>";
                echo "<td>" . $row['ime'] . "</td>";
                echo "<td>" . $row['prezime'] . "</td>";
                echo "<td>" . $row['ocena'] . "</td>";
                echo  "</tr>";
            }
            echo "</table>";
        }
    } 
 

   
?>
</body>
</html>