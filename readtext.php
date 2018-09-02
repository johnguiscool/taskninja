<?php


//Open the file and read it into the $text array
$my_file = 'file.txt';
$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$text = fread($handle,filesize("file.txt"));
fclose($handle);

//Use the array to
$array = explode("\n",$text);

$html = "";

for($i=0; $i < count($array) - 1; $i++)
{
  $split = explode("|",$array[$i]);

  $taskName = $split[1];
  $taskNumber = $split[0];

  $html = $html .

  "<div class='my-2 text-center row justify-content-center'>".
  " <span class='col-2 text-truncate text-left bg-light' style='display: inline-block;'>$taskName</span>";

  if($split[2]){
    $html = $html.  " <progress value='100' class='mx-2 col-2' id='task$taskNumber"."Progress'></progress>";
  } else {
    $html = $html. " <progress value='0' class='mx-2 col-2' id='task$taskNumber"."Progress'></progress>";

  }

  if($split[2]){
    $html=$html." <button disabled class='rounded btn-secondary col-2' id='task$taskNumber"."MarkCompleteButton'>Completed</button>";
  } else {
    $html=$html." <button onclick='markComplete(\"task$taskNumber\")' class='rounded btn-primary col-2' id='task$taskNumber"."MarkCompleteButton'>Mark Complete</button>";
  }

  $html = $html."</div>";

}

echo $html;

