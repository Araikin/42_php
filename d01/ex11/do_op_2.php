#!/usr/bin/php
<?php

function get_op($expr)
{
    for ($i = 0; $i < strlen($expr); $i++)
    {
        if ($expr[$i] == '+')
            return '+';
        if ($expr[$i] == '-')
            return '-';
        if ($expr[$i] == '*')
            return '*';
        if ($expr[$i] == '/')
            return '/';
        if ($expr[$i] == '%')
            return '%';
    }
    return '';
}

if ($argc == 2)
{
    $input = preg_replace("/ {1,}/", "", $argv[1]);
    $expr = preg_split('/(\/|\+|\*|-|%)/', $input);
    $a = $expr[0];
    $b = $expr[1];
    $op = get_op($input);

    if (!is_numeric($a) || !is_numeric($b) || $op == '')
        echo "Syntax Error";
    else if ($op == '+')
        echo $a + $b;
    else if ($op == '-')
        echo $a - $b;
    else if ($op == '/')
        echo $a / $b;
    else if ($op == '*')
        echo $a * $b;
    else if ($op == '%')
        echo $a % $b; 
   echo "\n";
}
else
    echo "Incorrect Parameters\n";
?>