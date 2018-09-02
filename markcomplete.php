<?php

$taskNumber = $_REQUEST["taskNumber"];


//Open the file and read it into the $text array
$my_file = 'file.txt';
$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$text = fread($handle,filesize("file.txt"));
fclose($handle);

//Use the array to
$array = explode("\n",$text);

$array[$taskNumber-1] = $array[$taskNumber-1]."x";

$str = "";

for($i=0;$i<count($array)-1;$i++)
{
  $str = $str.$array[$i]."\n";
}

echo $str;

$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);

fwrite($handle, $str);

fclose($handle);