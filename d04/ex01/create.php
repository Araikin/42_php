<?php
$login = $_POST['login'];
$passwd = $_POST['passwd'];
$submit = $_POST['submit'];

if ($submit == 'OK' && $passwd && $login)
{
    if (!file_exists("../private"))
        mkdir("../private");
    $i = -1;
    if (file_exists("../private/passwd"))
    {
        $db = unserialize(file_get_contents("../private/passwd"));
        foreach ($db as $i => $user)
            if ($user['login'] == $login)
                exit("ERROR\n");
    }
    $db[$i + 1]["login"] = $login;
    $db[$i + 1]["passwd"] = hash("whirlpool", $passwd);
    file_put_contents("../private/passwd", serialize($db));
    echo "OK\n";
}
else
    exit("ERROR\n");
?>
