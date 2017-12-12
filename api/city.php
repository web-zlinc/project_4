<?php
    header('Access-Control-Allow-Origin:*');

    $file_url = './data/city.json';
    $myfile = fopen($file_url, 'r') or die("Unable to open file!");
    $content = fread($myfile, filesize($file_url));

    echo $content;
    fclose($myfile);
?>    