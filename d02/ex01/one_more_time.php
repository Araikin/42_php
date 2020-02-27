#!/usr/bin/php
<?php
function process($arr) {
    date_default_timezone_set('Europe/Paris');
    $m = array(
		"1" => "Janvier",
		"2" => "Fevrier",
		"3" => "Mars",
		"4" => "Avril",
		"5" => "Mai",
		"6" => "Juin",
		"7" => "Juillet",
		"8" => "Aout",
		"9" => "Septembre",
		"10" => "Octobre",
		"11" => "Novembre",
		"12" => "Decembre");
    array_shift($arr);
}

if ($argc == 2)
{
    $arr = explode(" ", ucwords($argv[1]));
    if (count($arr) == 5)
        process($arr);
    else
        echo "Wrong Format\n";
}
else
    echo "Wrong Format\n";
?>