<?php require_once "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza muzika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $query = "SELECT kompozicije.naziv AS naziv, kompozicije.god AS godina, SEC_TO_TIME(kompozicije.trajanje*60) AS trajanje, periodi.naziv AS period 
        FROM kompozicije
        INNER JOIN periodi
        ON kompozicije.periodi_id = periodi.id
        ORDER BY kompozicije.naziv";



        $result = $conn->query($query);
        if (!$result->num_rows) {
            echo "<p class='info'>Nema pacijenata u bazi</p>";
        }
        else {
            echo "<table class='tabela'>";
            echo "<tr>
                <th>Kompozicija</th>
                <th>Godina</th>
                <th>Trajanje</th>
                <th>Period</th>
                </tr>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['naziv'] . "</td>";
                echo "<td>" . $row['godina'] . "</td>";
                echo "<td>" . $row['trajanje'] . "</td>"; //date('H:i', mktime(0,257)); hh:mm:ss
                echo "<td>" . $row['period'] . "</td>";
                echo  "</tr>";
            }
            echo "</table>";
        }   

    ?>
</body>
</html>





