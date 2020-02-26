#!/usr/bin/php
<?php
if ($argc > 1)
{
    $n = trim($argv[1]);
    $n = preg_replace("/ {2,}/", " ", $n);
    $words = explode(' ', $n);
    array_push($words, array_shift($words));
    for ($i = 0; $i < count($words); $i++)
    {
        if ($i > 0)
            echo " ";
        echo $words[$i];
    }
    echo "\n";
}
?>