#!/usr/bin/php
<?php
if ($argc == 2)
{
    if (!file_exists($argv[1]))
        exit ("No such file\n");
    else {
        $input = file_get_contents($argv[1]);
        $input = preg_replace_callback(
            "/(<a )(.*?)(>)(.*)(<\/a>)/",
            function($matches) {
                $matches[0] = preg_replace_callback(
                   "/( title=\")(.*?)(\")/", 
                   function($matches) {
                       return ($matches[1].strtoupper($matches[2]).$matches[3]);
                   }, $matches[0]);
                $matches[0] = preg_replace_callback(
                    "/(>)(.*?)(<)/",
                    function($matches) {
                        return ($matches[1].strtoupper($matches[2]).$matches[3]);
                    }, $matches[0]);
                return ($matches[0]);
            }, $input);
        echo $input;
    }
}
else
    exit ("Invalid number of arguments\n");
?>