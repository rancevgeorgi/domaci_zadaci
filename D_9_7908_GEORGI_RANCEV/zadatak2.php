<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $stanovnici = 6000000;
        $testirani = 4000000;
        $pozitivni = 600001;
        if($pozitivni / $testirani > 0.3 || $pozitivni / $stanovnici > 0.1){
            echo "<p style = 'color:red;'>VANREDNO STANJE</p>";
        }
    ?>
</body>
</html>