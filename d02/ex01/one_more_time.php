#!/usr/bin/php
<?php
function check_month($str) {
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
    return (array_search($str, $m));
}
function check_week_day($str) {
    $d = array (
        "Lundi",
        "Mardi",
        "Mercredi",
        "Jeudi",
        "Vendredi",
        "Samedi",
        "Dimanche");
    return (in_array($str, $d));
}

function is_leap($year)
{
    $t = time();
    if(!is_null($year)){
        if(strlen($year) == 4)
            $year = $year . '-01-01';
        $t = strtotime("$year");
    }
    if(date('L', $t) == 1)
        return true;
    return false;
}

function check_day_month($arr) {
    $d = $arr[1];
    $m = check_month($arr[2]);
    $y = $arr[3];
    if ((($m == "4" || $m == "6" || $m == "9" || $m == "11") && $d > 30) ||
        ($m == "2" && (($d > 28 && !is_leap($y)) || ($d > 29 && is_leap($y)))))
        return 0;
    return 1;
}

function check($arr) {
    $m = check_month($arr[2]);
    $d = check_week_day($arr[0]);
    $x = check_day_month($arr);
    if (preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $arr[4]) === 0 ||
        preg_match("/^[0][1-9]|[1-2][0-9]|[3][0-1]|[1-9]$/", $arr[1]) === 0 ||
        preg_match("/^[0-9]{4}$/", $arr[3]) === 0 || !$m || !$d || !$x)
        return false;
    return true;
}

if ($argc == 2)
{
    $arr = explode(" ", ucwords($argv[1]));
    if (count($arr) == 5 && check($arr))
    {
        date_default_timezone_set('Europe/Paris');
        $time = explode(":", $arr[4]);
        $month = check_month($arr[2]);
        $seconds = mktime($time[0], $time[1], $time[2], $month, $arr[1], $arr[3]);
        echo $seconds."\n";
    }
    else
        echo "Wrong Format\n";
}
else
    echo "Wrong Format\n";
?>