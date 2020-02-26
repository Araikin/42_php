#!/usr/bin/php
<?php
if ($argc == 2) {
    $n = trim($argv[1]);
    $n = preg_replace("/ {2,}/", " ", $n);
    echo $n."\n";
}
?>