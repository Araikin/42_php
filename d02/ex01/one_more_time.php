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
    $d = array (
        "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    print_r($d);
    array_shift($arr);
}

function check($arr) {
    if (preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $arr[4]) != 0 ||
        preg_match("/^[0-9]{4}$/", $arr[3]) != 0)
        return true;
    return false;

    // if (preg_match("", $arr[0]) != 0 || preg_match("", $arr[1]) != 0 ||
    //     preg_match("", $arr[2]) != 0 || preg_match("/^[0-9]{4}$/", $arr[3]) != 0 ||
    //     return false;

}

if ($argc == 2)
{
    $arr = explode(" ", ucwords($argv[1]));
    if (count($arr) == 5 && check($arr))
        process($arr);
    else
        echo "Wrong Format\n";
}
else
    echo "Wrong Format\n";
?>