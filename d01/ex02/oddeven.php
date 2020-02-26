#!/usr/bin/php
<?php
while (!feof(STDIN))
{
    echo "Enter a number: ";
    $n = trim(fgets(STDIN));
    if ($n)
    {
        if (is_numeric($n)) {
            if ($n % 2 == 0)
                echo "The number $n is even\n";
            else
                echo "The number $n is odd\n";
        }
        else
            echo "'$n' is not a number\n";
    }
}
?>