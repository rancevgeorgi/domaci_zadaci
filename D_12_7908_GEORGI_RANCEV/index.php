<?php

function digitron($num1, $num2, $operator)
{
    if ($operator == "+")
    {
        $result = $num1 + $num2;
        echo "$num1 + $num2 = $result";
    }
    elseif ($operator == "-")
    {
        $result = $num1 - $num2;
        echo "$num1 - $num2 = $result";
    }
    elseif ($operator == "*")
    {
        $result = $num1 * $num2;
        echo "$num1 * $num2 = $result";
    }
    elseif ($operator == "/")
    {
        $result = $num1 / $num2;
        echo "$num1 / $num2 = $result";
    }
}

digitron(120, 5, "/");

?>