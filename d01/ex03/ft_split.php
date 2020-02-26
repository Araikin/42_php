#!/usr/bin/php
<?php
function ft_split($s) {
    $s = preg_replace("/ {2,}/", " ", $s);
    $words = explode(' ', $s);
    sort($words);
    return($words);
}
?>