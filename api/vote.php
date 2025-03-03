<?php
include_once "db.php";

$subject_id=$_POST['subject_id'];
$option_id=$_POST['vote'];

$option=$Que->find($option_id);
$subject=$Que->find($subject_id);
$o=$option['vote']++;
$s=$subject['vote']++;

$Que->save(['vote'=>$o]);
$Que->save(['vote'=>$s]);

to("../index.php?do=result&id=$subject_id");