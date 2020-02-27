#!/usr/bin/php
<?php
while (!feof(STDIN))
{
    echo "Enter a number: ";
    $n = trim(fgets(STDIN));
    if (is_numeric($n)) {
        if ($n % 2 == 0)
            echo "The number $n is even";
        else
            echo "The number $n is odd";
    }
    else if (!feof(STDIN))
        echo "'$n' is not a number";
    echo "\n";
}
?>