#!/usr/bin/php
<?php
date_default_timezone_set("America/Los_Angeles");

$path = "/var/run/utmpx";
$file = fopen($path, "r");
$size = filesize($path);
while ($utmpx = fread($file, $size / 4)){
    $unpack[] = unpack("a256a/a4b/a32c/id/ie/L2f/a256g/i16h", $utmpx);
}
sort($unpack);
foreach($unpack as $val)
    if ($val['a'] !== "utmpx-1.00" && $val['a'] != null && $val['e'] == 7)
		echo $val['a']." ".$val['c']."  ".date("M j H:i", $val['f1'])." \n";
?>