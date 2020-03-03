<?php
function auth($login, $passwd) {
    $db = unserialize(file_get_contents("../private/passwd"));
    foreach ($db as $user)
        if ($user['login'] == $login && $user['passwd'] == hash("Whirlpool", $passwd))
            return true;
    return false;
}
?>
