<?php
    echo "<p>Zadatak 1a</p>";
    $n = 5;
    $m = 40;
    $p = 1;
    $zbir = 0;
    while ($n <= $m)
    {
        if ($n % 7 == 0 && $n % 3 != 0) 
        {
            $p = $p * $n;
        }
        if ($n % 3 == 0 && $n % 7 != 0)
        {
            $zbir = $zbir + $n;  
        }
        $n++; 
    }
    $k = $p - $zbir;
    echo "<p>prizvod brojeva je $p</p>";
    echo "<p>proizvod minus zbir je $k</p>";

    echo "<p>Zadatak 1b</p>";
    $n = 5;
    $m = 40;
    $p = 1;
    $zbir = 0;
    for ($i=$n; $i <= $m ; $i++) 
    { 
        if ($i % 7 == 0 && $i % 3 != 0) 
        {
            $p = $p * $i;
        }
        if ($i % 3 == 0 && $i % 7 != 0)
        {
            $zbir = $zbir + $i;  
        }
    }
    $k = $p - $zbir;
    echo "<p>prizvod brojeva je $p</p>";
    echo "<p>proizvod minus zbir je $k</p>";

    echo "<p>Zadatak 2 a</p>";
    $n = 2;
    $m = 5;
    $suma = 0;
    while ($n <= $m)
    {
        if ($n % 2 != 0)
        {
            $suma = $suma + $n**3;
        }
        $n++;
    }
    echo "<p>Suma kubova je $suma</p>";

    echo "<p>Zadatak 2 b</p>";
    $n = 2;
    $m = 5;
    $suma = 0;
    for ($i=$n; $i <= $m; $i++)
    { 
        if ($i % 2 != 0)
        {
            $suma = $suma + $i**3;
        }
    }
    echo "<p>Suma kubova je $suma</p>";

?>