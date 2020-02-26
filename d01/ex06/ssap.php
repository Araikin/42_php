#!/usr/bin/php
<?php
if ($argc > 1)
{
    $tab = [];
    for ($i = 1; $i < $argc; $i++)
    {
        $n = trim($argv[$i]);
        $n = preg_replace("/ {2,}/", " ", $n);
        $words = explode(' ', $n);
        $tab = array_merge($tab, $words);
    }
    sort($tab);
    foreach ($tab as $i)
        echo $i."\n";
}
?>