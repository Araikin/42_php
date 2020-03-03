<?php
session_start();
$login = $_POST['login'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
$submit = $_POST['submit'];

if ($submit != 'OK' || !$oldpw || !$newpw || !$login || $oldpw == $newpw ||
    !file_exists("../private") || !file_exists("../private/passwd"))
    exit("ERROR\n");
$db = unserialize(file_get_contents("../private/passwd"));
foreach ($db as &$user) {
	if ($user['login'] == $login && $user['passwd'] == hash("whirlpool", $oldpw)) {
        $user['passwd'] = hash("whirlpool", $newpw);
		file_put_contents("../private/passwd", serialize($db));
		exit("OK\n");
	}
}
exit("ERROR\n");
?>
