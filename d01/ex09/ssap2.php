#!/usr/bin/php
<?php
function ft_split($s)
{
    $n = trim($s);
    $n = preg_replace("/ {2,}/", " ", $n);
    $words = explode(' ', $n);
    return ($words);
}

function ft_cmp($a, $b)
{
    $ascii = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    $i = 0;
    while ($i < strlen($a) || $i < strlen($a))
    {
        $a_pos = stripos($ascii, $a[$i]);
        $b_pos = stripos($ascii, $b[$i]);
        if ($a_pos > $b_pos)
           return (1);
        else if ($a_pos < $b_pos)
            return (-1);
        $i++;
    }
}

if ($argc > 1)
{
    $tab = [];
    for ($i = 1; $i < $argc; $i++)
        $tab = array_merge($tab, ft_split($argv[$i]));
    usort($tab, "ft_cmp");
    foreach ($tab as $i)
        echo $i."\n";
}
?>