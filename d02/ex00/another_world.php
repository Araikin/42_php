#!/usr/bin/php
<?php
if ($argc > 1)
{
    $input = trim($argv[1]);
    $input = preg_replace("/ {2,}/", " ", $input);
    echo $input."\n";
}
?>