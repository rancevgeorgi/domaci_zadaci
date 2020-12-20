<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadatak 1</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
    <p>Da li se kafić pridržava propisanih mera?</p>
    <?php
        $v = 1000;
        $n = 433;
        $visak = ceil($n - $v/3);
        if($v / $n >= 3){
            echo "<p id='zelen' >DA</p>";
        }
        else {
            echo "<p class='crvena'>NE</p> <p class='crvena'>$visak ljudi treba da napusti lokal</p>";
        }
    ?>

</body>
</html>