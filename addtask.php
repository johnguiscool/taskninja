<?php

$taskNumber = $_REQUEST["taskNumber"];

$taskDescription = $_REQUEST["taskDescription"];

echo "$taskNumber $taskDescription";

$my_file = 'file.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
$data = "$taskNumber|$taskDescription|\n";
fwrite($handle, $data);
fclose($handle);

$my_file = 'tasknumber.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
$data = "x";
fwrite($handle, $data);
fclose($handle);